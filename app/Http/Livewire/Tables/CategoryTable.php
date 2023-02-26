<?php

namespace App\Http\Livewire\Tables;

use App\Models\Category;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;

class CategoryTable extends DataTableComponent
{
  protected $model = Category::class;
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
    $query = Category::query();
    $query->with("region");
    return $query;
  }
  public function columns(): array
  {

    return [
      Column::make("name", "name")
        ->searchable()
        ->sortable(),
      ComponentColumn::make("Image", "image")
        ->component("helper.table.avatar")
        ->attributes(fn ($value, $row, Column $column) => [
          "image" => $row->image,
        ]),
      Column::make("description", "description")
        ->format(function ($value) {
          return $value ?? '<span class="badge bg-label-danger">No Description</span>';
        })
        ->html()
        ->searchable()
        ->sortable(),
      BooleanColumn::make("status")
        ->collapseOnMobile()
        ->sortable(),
      ComponentColumn::make("Change Status", "id")
        ->component("helper.table.status-switch")
        ->attributes(fn ($value, $row, Column $column) => [
          "id" => $row->id,
          "status" => (int) $row->status,
        ]),
      Column::make("Created at", "created_at")
        ->format(function ($value) {
          return '<span class="badge bg-label-primary">' . $value->format('jS M Y H:i a') . '</span>';
        })
        ->html()
        ->searchable()
        ->collapseOnMobile()
        ->sortable(),
    ];
  }

  public function changeStatus(string $id, bool $status)
  {


    $user =  Category::findOrFail($id);
    $user->status = $status;
    $user->save();
    $this->dispatchBrowserEvent(
      'lwToast',
      [
        'title' => 'Success',
        'message' =>  '<span class="text-danger">' . $user->name . '</span> is  ' . ($status ? 'activated' : 'deactivated') . ' successfully',
        'type' => 'success'
      ]
    );
  }
}
