<?php

namespace App\Http\Resources\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class IndicateurResource extends JsonResource
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
            
            "libelle"=>$this->libelle,
            "description"=>$this->description,
            "mesure_id"=>$this->mesure,
            "value"=>$this->value,
            "links"=>$this->links
        ];
    }
}
