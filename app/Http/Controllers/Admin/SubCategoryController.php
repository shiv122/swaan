<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Manager\FileManager;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
  public function index()
  {
    $categories = Category::active()->get();
    return view('content.admin.tables.metadata.sub-category', compact('categories'));
  }



  public function store(Request $request, FileManager $fileManager)
  {
    $request->validate([
      'category' => 'required|exists:categories,id',
      'name' => 'required|string|max:255',
      'image' => 'nullable|image|max:5000',
      'description' => 'nullable|string|max:5000',
    ]);

    $sub = SubCategory::create([
      'category_id' => $request->category,
      'name' => $request->name,
      'image' => $fileManager->upload($request->image, 'images/sub-category'),
      'description' => $request->description,
    ]);

    return response([
      'message' => 'Sub category ' . $sub->name . ' created successfully',
    ]);
  }
}
