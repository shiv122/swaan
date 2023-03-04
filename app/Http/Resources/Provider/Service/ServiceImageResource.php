<?php

namespace App\Http\Resources\Provider\Service;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceImageResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
   */
  public function toArray($request)
  {
    return [
      'id' => $this->id,
      'image' => asset($this->image),
      'service_id' => $this->service_id,
      'created_at' => $this->created_at,
    ];
  }
}
