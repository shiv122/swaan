<?php

namespace App\Http\Requests\Provider;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, mixed>
   */

  /*name
category_id
sub_category_id
description
latitude
longitude
type
price
discount
hours
minutes
status
*/

  public function rules()
  {
    return [
      'name' => 'required|string',
      'category_id' => 'required|integer|exists:categories,id',
      'sub_category_id' => 'nullable|integer|exists:sub_categories,id',
      'description' => 'nullable|string|max:5000',
      'latitude' => 'nullable|string',
      'longitude' => 'nullable|string',
      'type' => 'required|in:fixed,hourly',
      'price' => 'required|numeric',
      'discount' => 'nullable|numeric',
      'hours' => 'required_without:minutes|integer',
      'minutes' => 'required_without:hours|integer',
      'images' => 'required|array',
      'images.*' => 'image|mimes:jpeg,png,jpg,svg|max:1024',
      'slots' => 'nullable|array',
      'slots.*.id' => 'nullable|integer|exists:provider_slots,id',
    ];
  }
}
