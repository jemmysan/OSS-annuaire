<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'deleted_at'
    ];

    
}
