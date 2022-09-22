<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RecipesResource extends JsonResource
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
            'id'=>(string) $this->id,
            'title'=>$this->title,
            'image_url'=>$this->image_url,
            'preparation_time'=>$this->preparation_time,
            'cooking_time'=>$this->cooking_time,
            'level'=>$this->level,
            'serves'=>$this->serves,
            'ingredients'=>$this->ingredients,
            'method'=>$this->method,
            'cook_id'=>$this->cook_id,
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,
        ];
    }
}