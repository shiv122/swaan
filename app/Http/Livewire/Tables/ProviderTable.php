<?php

namespace App\Http\Livewire\Tables;

use App\Models\Provider;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;

class ProviderTable extends DataTableComponent
{
  protected $model = Provider::class;
  public $addButton = true;

  public function configure(): void
  {
    $this->setPrimaryKey("id");
    $this->setDefaultSort("id", "desc");
    $this->setSearchEnabled();
    $this->setSearchDebounce(500);
  }

  public function columns(): array
  {

    return [
      Column::make("id", "id")
        ->searchable()
        ->sortable(),
      Column::make("name")
        ->searchable()
        ->sortable(),
      Column::make("email")
        ->searchable()
        ->sortable(),
      Column::make("phone")
        ->searchable()
        ->sortable(),
      Column::make("Service Count", "id")
        ->sortable(fn ($query, $direction) => $query->withCount(['services'])->orderBy('services_count', $direction)),
      Column::make("address")
        ->searchable()
        ->sortable(),
      ComponentColumn::make("Image", "image")
        ->component("helper.table.avatar")
        ->attributes(fn ($value, $row, Column $column) => [
          "image" => $row->image,
        ]),
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
        ->format(function ($value, $row) {
          return '<span class="badge bg-label-success">' . $value->format('jS M Y H:i a') . '</span>';
        })
        ->html()
        ->searchable()
        ->collapseOnMobile()
        ->sortable(),

    ];
  }

  public function builder(): Builder
  {
    $query = Provider::query()->withCount(['services']);
    return $query;
  }
  public function changeStatus(string $id, bool $status)
  {


    $provider =  Provider::findOrFail($id);
    $provider->status = $status;
    $provider->save();
    $this->dispatchBrowserEvent(
      'lwToast',
      [
        'title' => 'Success',
        'message' =>  '<span class="text-danger">' . $provider->name . '</span> is  ' . ($status ? 'activated' : 'deactivated') . ' successfully',
        'type' => 'success'
      ]
    );
  }
}
