<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Provider extends Authenticatable
{
  use HasFactory, HasApiTokens, Notifiable;

  protected $guarded = [];


  public function services()
  {
    return $this->hasMany(Service::class, 'provider_id');
  }


  public function slots()
  {
    return $this->hasMany(ProviderSlot::class);
  }



  public function scopeActive()
  {
    return $this->where('status', 1);
  }
}
