<?php

namespace App\Models;

use App\Models\Startup;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Statut extends Model
{
    use HasFactory;
    
    protected $fillable = ['ordre','libelle'];
    protected $hidden =  ['created_at','updated_at'];


    public function statutStartup(){
        return $this->hasMany(StatutStartup::class);
    }

}
