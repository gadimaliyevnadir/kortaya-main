<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductsFilterResource extends JsonResource
{
    public function toArray($request)
    {
        return [
          'id' => $this->id,
          'name' => $this->name,
          'slug' => $this->slug,
          'category_id' => optional($this->category)->id,
          'category_name' => translation_first($this->category)->name,
          'brand_name' => optional($this->brand)->name,
          'quantity' => $this->quantity,
          'price' => $this->price,
          'discount_price' => $this->discount_price,
          'image' => $this->first_image  ?: asset('backend/img/noimage.jpg'),
        ];
    }
}
