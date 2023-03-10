<?php

namespace App\Http\Livewire\Tables;

use App\Models\SubCategory;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;

class SubCategoryTable extends DataTableComponent
{
  protected $model = SubCategory::class;
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
    $query = SubCategory::query();
    return $query;
  }
  public function columns(): array
  {

    return [
      Column::make("id", "id")
        ->searchable()
        ->sortable(),

      Column::make("name", "name")
        ->searchable()
        ->sortable(),
      ComponentColumn::make("Image", "image")
        ->component("helper.table.avatar")
        ->attributes(fn ($value, $row, Column $column) => [
          "image" => $row->image,
        ]),
      Column::make("description", "description")
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
          return '<span class="badge bg-label-success">' . $value->format("jS M Y H:i a") . '</span>';
        })
        ->html()
        ->searchable()
        ->collapseOnMobile()
        ->sortable(),

    ];
  }



  public function changeStatus(string $id, bool $status)
  {


    $sub =  SubCategory::findOrFail($id);
    $sub->status = $status;
    $sub->save();
    $this->dispatchBrowserEvent(
      "lwToast",
      [
        "title" => "Success",
        "message" =>  '<span class="text-danger">' . $sub->name . '</span> is  ' . ($status ? "activated" : "deactivated") . ' successfully',
        "type" => "success"
      ]
    );
  }
}
