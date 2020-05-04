<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'sku' => $this->sku, 
            'title' => $this->title, 
            'image' => $this->image, 
            'category' => $this->category, 
            'price' => $this->price,
        ];
    }
}
