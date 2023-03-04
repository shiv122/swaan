<?php

namespace App\Http\Resources\Provider;

use App\Http\Resources\Provider\Service\ServiceImageResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProviderResource extends JsonResource
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
      'name' => $this->name,
      'email' => $this->email,
      'phone' => $this->phone,
      'description' => $this->description,
      'address' => $this->address,
      'latitude' => $this->latitude,
      'longitude' => $this->longitude,
      'slots' => SlotResource::collection($this->whenLoaded('slots')),
      'images' => ServiceImageResource::collection($this->whenLoaded('images')),
    ];
  }
}
