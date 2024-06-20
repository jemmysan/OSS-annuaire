<?php

namespace App\Models;

use App\Models\EvolutionStartup;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function evolutionStartup() : HasMany{
        return $this->hasMany(EvolutionStartup::class);
    }
}
