<?php

namespace App\Http\Controllers\Api\User\Auth;


use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Authentication\UserAuthenticationService;


/**
 * @group User Auth
 *
 * APIs for user authentication and registration
 *
 */


class AuthController extends Controller
{

  /**
   * Login (Firebase based)
   */

  public function login(Request $request, UserAuthenticationService $authenticationService)
  {
    $request->validate([
      'token' => 'required|string',
      'device_id' => 'required|string|size:36',
    ]);

    // return  User::find(1)->createToken('user')->plainTextToken;


    return $authenticationService->login($request);
  }


  /**
   * Old Login (will be removed)
   *
   */

  public function oldLogin(Request $request)
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

  /**
   * Register (will be removed)
   *
   */

  public function register(Request $request)
  {
    $request->validate([
      'name' => 'required',
      'email' => 'required|email|unique:users',
      'phone' => 'required|unique:users',
      'password' => 'required',
      'device_id' => 'required',
    ]);

    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'phone' => $request->phone,
      'password' => \Hash::make($request->password),
      'device_id' => $request->device_id,
    ]);

    $token = $user->createToken('auth_token')->plainTextToken;

    return response()->json([
      'token' => $token,
      'status' => 'success',
    ]);
  }
}
