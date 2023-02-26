<?php

namespace App\Generators;

class TableGenerator
{


  public function generateTable(string $model, array $data)
  {
    $table_code = '<?php

    namespace App\Http\Livewire\Tables;

    use App\Models\\' . $model . ';
    use Rappasoft\LaravelLivewireTables\Views\Column;
    use Rappasoft\LaravelLivewireTables\DataTableComponent;
    use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
    use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;
    use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;
    use Illuminate\Database\Eloquent\Builder;

    class ' . $model . 'Table extends DataTableComponent
    {
      protected $model = ' . $model . '::class;
      public $addButton = true;

      public function configure(): void
      {
        $this->setPrimaryKey("id");
        $this->setDefaultSort("id", "desc");
        $this->setSearchEnabled();
        $this->setSearchDebounce(500);
      }
      public function query(): Builder
      {
          $query = ' . $model . '::query();';

    foreach ($data as $column) {
      if ($column['type'] == 'relation') {
        $relation = explode(':', $column['relation']);
        $table_code .= '$query->with("' . $relation[0] . '");';
      }
    }
    $table_code .= 'return $query;
      }
      public function columns(): array
      {

        return [
          Column::make("id", "id")
        ->searchable()
        ->sortable(),
          ';



    foreach ($data as $item) {
      if ($item['type'] == 'relation') {
        $relation = explode(':', $item['relation']);
        $table_code .= '
        Column::make("' . $relation[0] . '", "' . $relation[0] . '.name")
          ->searchable()
          ->sortable(),';
      } elseif ($item['type'] === 'boolean') {

        $table_code .= '
        BooleanColumn::make("' . $item['name'] . '")
          ->collapseOnMobile()
          ->sortable(),
          ComponentColumn::make("Change Status", "id")
          ->component("helper.table.status-switch")
          ->attributes(fn ($value, $row, Column $column) => [
            "id" => $row->id,
            "status" => (int) $row->status,
          ]),';
      } elseif ($item['type'] == 'image') {

        $table_code .= '
        ImageColumn::make("' . $item['name'] . '")
          ->sortable(),';
      } else {
        $table_code .= '
        Column::make("' . $item['name'] . '", "' . $item['name'] . '")
          ->searchable()
          ->sortable(),';
      }
    }

    $table_code .= '
    Column::make("Created at", "created_at")
        ->format(function ($value) {
          return \'<span class="badge bg-label-success">\' . $value->format("jS M Y H:i a") . \'</span>\';
        })
        ->html()
        ->searchable()
        ->collapseOnMobile()
        ->sortable(),

  ];
      }
    }


    public function changeStatus(string $id, bool $status)
    {


      $user =  Region::findOrFail($id);
      $user->status = $status;
      $user->save();
      $this->dispatchBrowserEvent(
        "lwToast",
        [
          "title" => "Success",
          "message" =>  \'<span class="text-danger">\' . $user->name . \'</span> is  \' . ($status ? "activated" : "deactivated") . \' successfully\',
          "type" => "success"
        ]
      );
    }







    ';


    // create file
    $file = fopen("app/Http/Livewire/Tables/" . $model . "Table.php", "w");
    fwrite($file, $table_code);
    fclose($file);
  }
}
