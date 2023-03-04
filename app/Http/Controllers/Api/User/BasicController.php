<?php

namespace App\Http\Controllers\Api\User;


use App\Models\Service;
use App\Models\Category;
use App\Models\Provider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Metadata\CategoryResource;
use App\Http\Resources\Provider\ProviderResource;
use App\Http\Resources\Provider\Service\ServiceResource;

/**
 * @group User Basic
 *
 * APIs for user basic operations
 *
 * @authenticated
 */


class BasicController extends Controller
{
  public function profile(Request $request)
  {
    return response()->json([
      'message' => 'User profile',
      'user' => $request->user(),
    ], 200);
  }

  public function categories(Request $request)
  {
    $categories = Category::active()->get();

    return CategoryResource::collection($categories);
  }


  public function services()
  {
    $services = Service::active()
      ->with(['images'])
      ->simplePaginate(10);
    return ServiceResource::collection($services);
  }


  public function providers()
  {
    $providers = Provider::active()->get();

    return ProviderResource::collection($providers);
  }
}
