<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  public function index()
  {
    return view('content.admin.basic.users');
  }

  public function store(UserRequest $request)
  {
    $request->validated();


    User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->password),
    ]);


    return response()->json([
      'message' => 'User created successfully',
      'data' => $request->all(),
    ], 201);
  }
}
