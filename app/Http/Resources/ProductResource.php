<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    
    public $product =  Product::class;
    
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $auteur = $this->whenLoaded('auteur');
        return [
            "id"=>$this->id,
            "name" => ucfirst($this->name), // La 1er lettre en majuscule
            "email" => $this->email,
            "mobile" => $this->mobile,
            "age" => $this->age,
            'auteur' => new AuteurResource($auteur),
            
        ];
    }
}
