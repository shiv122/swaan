<?php

namespace App\Http\Livewire\Tables;

use App\Models\User;
use App\Traits\UserTableTraits;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;

class UserTable extends DataTableComponent
{
  use UserTableTraits;
  protected $model = User::class;
  public $addButton = true;


  public function configure(): void
  {
    $this->setPrimaryKey('id');
    $this->setDefaultSort('id', 'desc');
    $this->setSearchEnabled();
    $this->setSearchDebounce(500);
  }

  public function columns(): array
  {
    return [
      Column::make("Id", "id")
        ->sortable(),
      Column::make("Name", "name")
        ->searchable()
        ->sortable(),
      Column::make("Email", "email")
        ->collapseOnMobile()
        ->searchable()
        ->sortable(),

      BooleanColumn::make('status')
        ->collapseOnMobile()
        ->sortable(),
      ComponentColumn::make('Change Status', 'id')
        ->component('helper.table.status-switch')
        ->attributes(fn ($value, $row, Column $column) => [
          'id' => $row->id,
          'status' => (int) $row->status,
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

  /*
  ||====================================================||
  || For custom or additional functionality,            ||
  || Go to App\Traits\UserTableTraits.php               ||
  ||====================================================||
  */
}
