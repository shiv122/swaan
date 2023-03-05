<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
  public function index()
  {
    return view('content.admin.tables.providers');
  }
}
