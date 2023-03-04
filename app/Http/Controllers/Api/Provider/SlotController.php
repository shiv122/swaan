<?php

namespace App\Http\Controllers\Api\Provider;

use App\Http\Controllers\Controller;
use App\Http\Resources\Provider\SlotResource;
use Illuminate\Http\Request;

/**
 * @group Provider Slot
 *
 * APIs for provider slot operations
 *
 * @authenticated
 */


class SlotController extends Controller
{
  public function index(Request $request)
  {
    $provider = $request->user();

    $slots = $provider->slots()->get();

    return SlotResource::collection($slots);
  }

  public function store(Request $request)
  {

    $request->validate([
      'day' => 'required',
      'start_time' => 'required',
      'end_time' => 'required',
    ]);

    $provider = $request->user();

    $provider->slots()->updateOrCreate([
      'day' => $request->day,
      'start_time' => $request->start_time,
      'end_time' => $request->end_time,
    ]);


    return response()->json([
      'message' => 'Slot created successfully',
      'status' => 'success'
    ]);
  }

  public function destroy(Request $request, $slot)
  {
    $provider = $request->user();

    $provider->slots()->where('id', $slot)->delete();

    return response()->json([
      'message' => 'Slot deleted successfully',
      'status' => 'success'
    ]);
  }
}
