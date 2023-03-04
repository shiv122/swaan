<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  use HasFactory;

  protected $guarded = [];


  public function regions()
  {
    return $this->hasMany(CategoryRegion::class);
  }









  public function scopeActive($query)
  {
    return $query->where('status', 1);
  }
}
