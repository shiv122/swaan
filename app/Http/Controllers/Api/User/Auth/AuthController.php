<?php

namespace App\Http\Controllers\Api\User\Auth;


use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


/**
 * @group User Auth
 *
 * APIs for user authentication and registration
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

    $user = User::where('email', $request->email)->firstOrFail();

    if (!\Hash::check($request->password, $user->password)) {
      return response()->json([
        'message' => 'Invalid credentials'
      ], 401);
    }

    $token = $user->createToken('auth_token')->plainTextToken;
    $user->update([
      'device_id' => $request->device_id,
    ]);

    return response()->json([
      'token' => $token,
      'status' => 'success',
    ]);
  }
}
