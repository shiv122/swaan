<?php

namespace App\Http\Controllers\Api\Provider;

use App\Http\Controllers\Controller;
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
}
