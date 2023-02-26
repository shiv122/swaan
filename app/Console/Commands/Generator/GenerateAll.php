<?php

namespace App\Console\Commands\Generator;

use Illuminate\Console\Command;
use App\Generators\BladeGenerator;
use App\Generators\TableGenerator;
use App\Generators\MigrationGenerator;

class GenerateAll extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'generator:generateAll';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Command description';

  /**
   * Execute the console command.
   *
   * @return int
   */
  public function handle()
  {

    $tableGenerator = new TableGenerator();
    $bladeGenerator = new BladeGenerator();
    $migrationGenerator = new MigrationGenerator();

    $name = $this->ask('What is your name of model?');
    $columns = $this->ask('What is your columns with type and length as example:
                             name:type:length:nullable:default
                         if relation with other table use this format:
                          user_id->users:id:nullable
     ');

    $columnArray = $this->extractColumns($columns);


    $bade_path = $this->ask('What is your blade path?');
    if ($bade_path === null) {
      $bade_path = 'tables';
    } else {
      $bade_path = 'tables/' . $bade_path;
    }


    $migrationGenerator->generateMigration($name, $columnArray);
    $bladeGenerator->generateBlade($name, $columnArray, $bade_path);
    $tableGenerator->generateTable($name, $columnArray);
    $this->call('make:model', [
      'name' => $name,
      '-m' => false
    ]);


    $this->info('All done!');
  }


  public function extractColumns(string $columns)
  {
    $column_data = [];
    $columns = explode(',', $columns);
    foreach ($columns as $column) {
      if (strpos($column, '->') !== false) {
        $column = explode('->', $column);
        $column_data[] = [
          'name' => $column[0],
          'type' => 'relation',
          'relation' => $column[1],

        ];
      } else {
        $column = explode(':', $column);
        $column_data[] = [
          'name' => $column[0],
          'type' => $column[1] ?? 'string',
          'length' => $column[2] ?? 255,
          'nullable' => $column[3] ?? false,
          'default' => $column[4] ?? null,
        ];
      }
    }

    return $column_data;
  }
}
