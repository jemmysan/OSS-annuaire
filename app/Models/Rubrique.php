<?php

namespace App\Models;

use App\Models\Formation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

   
    public function formation() : HasMany{
        return $this->hasMany(Formation::class);
    }
}
