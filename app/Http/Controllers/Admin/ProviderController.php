<?php

namespace App\Http\Controllers\Admin;

use App\Models\Provider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProviderController extends Controller
{
  public function index()
  {
    return view('content.admin.tables.providers');
  }


  public function services(Request $request)
  {
    $request->validate([
      'id' => 'required|integer'
    ]);

    $provider = Provider::find($request->id);

    $services = $provider->services()
      ->with([
        'category',
        'sub_category',
        'images',
        'slots',
        'provider'
      ])
      ->get();

    $html = view('components.helper.services', compact('services'))->render();

    return response()->json([
      'html' => $html
    ]);
  }
}
