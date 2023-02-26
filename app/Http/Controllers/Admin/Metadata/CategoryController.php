<?php

namespace App\Http\Controllers\Admin\Metadata;

use App\Models\Region;
use App\Models\Category;
use App\Manager\FileManager;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class CategoryController extends Controller
{
  public $fileManager;
  public function __construct()
  {
    $this->fileManager = new FileManager();
  }

  public function index()
  {
    $regions = Region::active()->get();
    return view('content.admin.tables.metadata.category', compact('regions'));
  }

  public function store(Request $request)
  {
    $request->validate([

      'regions' => 'nullable|array',
      'name' => 'required|string|max:255|unique:categories,name',
      'description' => 'nullable|string|max:3000',
      'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:512',
    ]);

    DB::beginTransaction();

    $category = Category::create([
      'name' => $request->name,
      'description' => $request->description,
      'image' => $this->fileManager->upload($request->image, 'images/categories', 'img'),
    ]);

    if ($request->regions) {
      foreach ($request->regions as $region) {
        $category->regions()->create([
          'region_id' => $region,
        ]);
      }
    }

    DB::commit();



    return response()->json([
      'message' => 'Category <strong class="text-success">' . $category->name . '</strong> created successfully',
    ]);
  }
}
