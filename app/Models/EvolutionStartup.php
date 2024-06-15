<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvolutionStartup extends Model
{
    use HasFactory;

    protected $fillable=[
        'evolution_id',
        'startup_id'
    ];

    protected $hidden = [
        'created_at',
        'deleted_at'
    ];

    
}
