<?php

namespace App\Http\Controllers\Admin\Metadata;

use App\Http\Controllers\Controller;
use App\Manager\FileManager;
use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
  public function index()
  {
    return view('content.admin.tables.metadata.region');
  }

  public function store(Request $request, FileManager $fileManager)
  {
    $request->validate([
      'name' => 'required|string|max:255',
      'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:512'
    ]);
    $region = Region::create([
      'name' => $request->name,
      'image' => $request->image ? $fileManager->upload($request->image, 'images/regions') : null
    ]);

    return response()->json([
      'message' => 'Region <span class="font-weight-bold text-success">' . $region->name . '</span> created successfully',
    ], 201);
  }
}
