<?php

namespace App\Http\Controllers\Api\Provider;

use App\Http\Controllers\Controller;
use App\Http\Requests\Provider\ServiceRequest;
use App\Http\Resources\Provider\Service\ServiceResource;
use App\Manager\FileManager;
use Illuminate\Http\Request;


/**
 * @group Provider Service
 *
 * APIs for provider service operations
 *
 * @authenticated
 */

class ServiceController extends Controller
{



  public function index()
  {
    $services = auth()->user()->services()->with(['images'])->get();
    return ServiceResource::collection($services);
  }



  public function store(ServiceRequest $request, FileManager $fileManager)
  {
    $request->validated();

    $provider = $request->user();

    $service = $provider->services()->create([
      'name' => $request->name,
      'category_id' => $request->category_id,
      'sub_category_id' => $request->sub_category_id,
      'description' => $request->description,
      'latitude' => $request->latitude,
      'longitude' => $request->longitude,
      'type' => $request->type,
      'price' => $request->price,
      'discount' => $request->discount ?? 0,
      'hours' => $request->hours,
      'minutes' => $request->minutes,
    ]);

    if ($request->hasFile('images')) {
      $data = [];
      foreach ($request->file('images') as $image) {
        $data[] = [
          'image' => $fileManager->upload($image, 'images/services'),
          'service_id' => $service->id,
          'created_at' => now(),
        ];
      }
      $service->images()->insert($data);
    }

    return response()->json([
      'message' => 'Service created successfully',
      'status' => 'success'
    ]);
  }
}
