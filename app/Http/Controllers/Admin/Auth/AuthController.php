<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
  public function login()
  {
    return view('content.admin.auth.login');
  }

  public function storeLogin(Request $request)
  {
    $request->validate([
      'email' => 'required|email',
      'password' => 'required',
      'remember' => 'boolean',
    ]);

    if (auth()->guard('admin')->attempt($request->only('email', 'password'), $request->remember)) {
      return [
        'message' => 'Logged in successfully',
        'redirect' => route('admin.dashboard'),
      ];
    }

    return response()->json([
      'message' => 'Invalid credentials',
    ], 401);
  }
}
