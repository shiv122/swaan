<?php

namespace App\Generators;

use Illuminate\Support\Str;


class MigrationGenerator
{
  public function generateMigration(string $model, array $data)
  {
    $migration_code = '<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class Create' . $model . 'Table extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create("' . Str::plural(strtolower(Str::snake($model))) . '", function (Blueprint $table) {
                $table->id();';
    foreach ($data as $item) {
      if ($item['type'] === 'string') {
        $migration_code .= '$table->string("' . $item['name'] . '",' . $item['length'] . ')';
        $migration_code .= $item['nullable'] ? '->nullable()' : null;
        $migration_code .= $item['default'] ? '->default("' . $item['default'] . '")' : null;
        $migration_code .=  ';';
      } elseif ($item['type'] === 'integer') {
        $migration_code .= '$table->integer("' . $item['name'] . '",' . $item['length'] . ')';
        $migration_code .= $item['nullable'] ? '->nullable()' : null;
        $migration_code .= $item['default'] ? '->default(' . $item['default'] . ')' : null;
        $migration_code .= ';';
      } elseif ($item['type'] === 'text' || $item['type'] === 'image') {
        $migration_code .= '$table->text("' . $item['name'] . '",' . $item['length'] . ')';
        $migration_code .= $item['nullable'] ? '->nullable()' : null;
        $migration_code .= $item['default'] ? '->default("' . $item['default'] . '")' : null;
        $migration_code .= ';';
      } elseif ($item['type'] === 'boolean') {
        $migration_code .= '$table->boolean("' . $item['name'] . '")';
        $migration_code .= $item['nullable'] ? '->nullable()' : null;
        $migration_code .= $item['default'] ? '->default(' . $item['default'] . ')' : null;
        $migration_code .= ';';
      } elseif ($item['type'] === 'relation') {
        $relation = explode(':', $item['relation']);
        $migration_code .= '$table->foreignId("' . Str::singular($item['name']) . '")->constrained("' . $relation[0] . '")';
        $migration_code .= $item['nullable'] ? '->nullable()' : null;
        $migration_code .= ';';
      }
    }
    $migration_code .= '
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists("' . strtolower($model) . '");
        }
    }';

    $file = fopen(base_path() . '/database/migrations/' . date('Y_m_d_His') . '_create_' . strtolower($model) . '_table.php', 'w');
    fwrite($file, $migration_code);
    fclose($file);
  }
}
