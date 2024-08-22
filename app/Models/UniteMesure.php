<?php

namespace App\Models;

use App\Models\Indicateur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UniteMesure extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle',
        'symbole'
    ];

    protected $hidden = [
        'updated_at',
        'created_at'
    ];

    
}
