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
  public function login(Request $request, UserAuthenticationService $authenticationService)
  {
    $request->validate([
      'token' => 'required|string',
      'device_id' => 'required|string|size:36',
    ]);

    // return  User::find(1)->createToken('user')->plainTextToken;


    return $authenticationService->login($request);
  }
}
