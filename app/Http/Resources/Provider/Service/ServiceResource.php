<?php

namespace App\Http\Resources\Provider\Service;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
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
      'category_id' => $this->category_id,
      'sub_category_id' => $this->sub_category_id,
      'description' => $this->description,
      'latitude' => $this->latitude,
      'longitude' => $this->longitude,
      'type' => $this->type,
      'price' => $this->price,
      'discount' => $this->discount,
      'hours' => $this->hours,
      'minutes' => $this->minutes,
      'images' => ServiceImageResource::collection($this->whenLoaded('images')),
      'created_at' => $this->created_at,
    ];
  }
}
