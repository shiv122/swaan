<?php

namespace App\Http\Controllers\Api\Provider\Auth;

use App\Models\Provider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Manager\FileManager;
use Illuminate\Support\Facades\Hash;

/**
 * @group Provider Auth
 *
 * APIs for provider authentication and registration
 *
 */


class AuthController extends Controller
{
  public function login(Request $request)
  {
    $request->validate([
      'email' => 'required|email',
      'password' => 'required',
      'device_id' => 'required',
    ]);
    $provider = Provider::where('email', $request->email)->firstOrFail();

    if (!Hash::check($request->password, $provider->password)) {
      return response()->json([
        'message' => 'Invalid credentials'
      ], 401);
    }

    $token = $provider->createToken('auth_token')->plainTextToken;
    $provider->update([
      'device_id' => $request->device_id,
    ]);

    return response()->json([
      'token' => $token,
      'status' => 'success',
    ]);
  }


  public function register(Request $request, FileManager $fileManager)
  {
    $request->validate([
      'name' => 'required',
      'email' => 'required|email|unique:providers',
      'phone' => 'required|unique:providers',
      'password' => 'required',
      'device_id' => 'required',
      'image' => 'required|image|mimes:jpeg,png,jpg|max:1024',
    ]);

    $provider = Provider::create([
      'name' => $request->name,
      'email' => $request->email,
      'phone' => $request->phone,
      'password' => Hash::make($request->password),
      'device_id' => $request->device_id,
      'image' => $fileManager->upload($request->image, 'images/providers'),
    ]);

    $token = $provider->createToken('auth_token')->plainTextToken;

    return response()->json([
      'token' => $token,
      'status' => 'success',
    ]);
  }
}
