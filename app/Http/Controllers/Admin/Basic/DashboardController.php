<?php

namespace App\Http\Controllers\Admin\Basic;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Provider;
use App\Models\Region;
use App\Models\Service;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function index()
  {

    $user_count = User::count();
    $provider_count = Provider::count();
    $service_count = Service::count();
    $category_count = Category::count();
    $subcategory_count = SubCategory::count();
    $region_count = Region::count();


    return view('content.admin.basic.dashboard', compact(
      'user_count',
      'provider_count',
      'service_count',
      'category_count',
      'subcategory_count',
      'region_count'
    ));
  }
}
