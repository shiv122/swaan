<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function index()
  {
    return view('content.admin.basic.users');
  }

  public function store(UserRequest $request)
  {
    $request->validated();

    return response()->json([
      'message' => 'User created successfully',
      'data' => $request->all(),
    ], 201);
  }
}
