<?php

namespace App\Generators;

use Illuminate\Support\Str;


class BladeGenerator
{


  public function generateBlade(string $name, array $data, string $blade_path)
  {
    $html = '@extends("layouts/layoutMaster")

    @section("title", "' . $name . '")

    @section("content")

        <x-utils.card>
            <livewire:tables.' . strtolower(Str::kebab($name)) . '-table addButton="add-' . strtolower(Str::kebab($name)) . '" />
        </x-utils.card>


        <x-utils.offcanvas id="add-' . strtolower(Str::kebab($name)) . '" title="Add ' . $name . '">
            <form id="add-' . strtolower(Str::kebab($name)) . '-form">
                <div class="row">
                      <span class="text-danger">Add Fields here</span>
                    <div class="col-12 mt-3 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </x-utils.offcanvas>


    @endsection

    @section("page-script")

    @endsection
    ';
    $path = 'resources/views/content/admin/' . $blade_path;

    if (!is_dir(base_path($path))) {
      mkdir(base_path($path), 0777, true);
    }

    $file = fopen(base_path($path . '/' . strtolower(Str::kebab($name)) . '.blade.php'), 'w');
    fwrite($file, $html);
    fclose($file);
  }
}
