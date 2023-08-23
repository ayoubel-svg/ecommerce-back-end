<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductRessource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "quantity" => $this->quantity,
            "price" => $this->price,
            "bought" => $this->bought,
            "description" => $this->description,
            "category" => $this->category->name,
            "image" => $this->images[0]->image,
            "categoryNum" => count($this->category->product)
        ];
    }
}
