<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ProductResource;

class AuteurResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
         
        return[
           "id"=>$this->id,
            "name" => ucfirst($this->name), // La 1er lettre en majuscule
            "pays" => $this->pays,
            'products' => ProductResource::collection($this->whenLoaded('products')),
         ];
    }
}
