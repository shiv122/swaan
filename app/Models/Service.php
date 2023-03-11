<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
  use HasFactory;

  protected $guarded = [];



  public function provider()
  {
    return $this->belongsTo(Provider::class);
  }

  public function slots()
  {
    return $this->hasMany(ServiceSlot::class);
  }

  public function images()
  {
    return $this->hasMany(ServiceImage::class);
  }

  public function category()
  {
    return $this->belongsTo(Category::class);
  }

  public function sub_category()
  {
    return $this->belongsTo(SubCategory::class);
  }


  public function scopeActive()
  {
    return $this->where('status', 1);
  }
}
