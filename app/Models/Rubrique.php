<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rubrique extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle','description','ordre'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
