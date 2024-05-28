<?php


namespace App\Http\Requests;


use Illuminate\Support\Facades\Auth;

class UnlikeRequest extends LikeRequest
{


    public function authorize()
    {
        return $this->user()->can('unlike', $this->likeable());
    }



}
