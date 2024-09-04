<?php

namespace App\Http\Resources\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StartupIndicateurResource extends JsonResource
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
            'startup_id'=>$this->startup_id,
            'startup'=>$this->startup,
            'indicateurs'=>$this->indicateur,
            'date'=>$this->date,
            'value'=>$this->value
        ];
    }
}
