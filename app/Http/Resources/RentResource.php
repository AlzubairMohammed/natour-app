<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $for_rent = $this->forRent; 
        return [
            'id' => $this->id,
            'user' => (new UserResource($this->customer->user)),
            'title' => $this->title,
            'description' => $this->description,
            'type' => $this->type,
            'washroom' => $this->washroom,
            'balcony' => $this->balcony,
            'position' => $this->position,
            'bad' => $this->bad,
            'is_active' => $this->is_active,
            'rent_info' => (new RentInfoResource($this->rentinfo)),
            'thumbnails' => $this->thumbnails,
            'benefits' => (new BenefitResource($this->facility)),
            'charges' => (new CostResource($this->cost)),
            'religion' => (new ReligionResource($this->religion)),
            'for_rent' => (new ForRentResource($for_rent)),
        ];
    }
}
