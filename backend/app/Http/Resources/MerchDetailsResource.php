<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class MerchDetailsResource extends JsonResource
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
            'description' => $this->description,
            'type'=> TypeResource($this->type),
            'vendor'=> VendorResource($this->vendor),
            'photo'=> asset($this->photo),
            'name'=> $this->name,
            'stock'=> $this->stock,
        ];
    }
}
