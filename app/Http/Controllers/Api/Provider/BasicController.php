<?php

namespace App\Http\Controllers\Api\Provider;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;


/**
 * @group Provider Basic
 *
 * APIs for provider basic operations
 *
 * @authenticated
 */

class BasicController extends Controller
{
  public function profile(Request $request)
  {

    return response()->json([
      'status' => 'success',
      'provider' => $request->user(),
    ], 200);
  }


  public function categories()
  {
    $categories = Category::active()->with('subcategories')->get();

    return response()->json([
      'status' => 'success',
      'categories' => $categories,
    ], 200);
  }
}
