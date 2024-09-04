<?php

namespace App\Models;

use App\Models\UniteMesure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Indicateur extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle',
        'description',
        'mesure_id'
    ];

    protected $hidden =[
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function mesure(){
        return $this->belongsTo(UniteMesure::class, 'mesure_id');
    }
}
