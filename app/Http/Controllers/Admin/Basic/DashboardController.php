<?php

namespace App\Http\Controllers\Admin\Basic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function index()
  {
    return view('content.admin.basic.dashboard');
  }
}
