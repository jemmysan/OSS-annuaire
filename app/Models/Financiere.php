<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Financiere extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_structure',
        'description',
        'partenariat_orange',
        'nom_prenom_directeur',
        'adresses',
        'coordonnee',
        'site_web',
        'email',
        'user_id'

    ];
    public  function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /*public function commentaires(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ComFinance::class);
    }*/


}
