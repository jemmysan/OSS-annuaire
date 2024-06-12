<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evolution extends Model
{
    use HasFactory;

    protected $fillable = [
        'ordre',
        'libelle',
        'description'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        '_token'
    ];
}
