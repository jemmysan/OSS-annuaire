<?php

namespace App\Models;

use App\Contrats\Likeable;
use App\Models\Concerns\Likes;
use App\Models\EvolutionStartup;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Startup extends Model implements Likeable

{
    use HasFactory;
    use Likes;
    protected $fillable = [
        'nom_startup',
        'description',
        'partenariat_orange',
        'date_creation',
        'ceo_co_fondateur',
        'logo',
        'adresses',
        'site_web',
        'filename',
        'video',
        'email',
        'leve_fond',
        'montant_fonds',
        'date_leve_fond',
        'coordonnee',
        'user_id',
        'referent',
        'autre_part',
        'statut',


    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
        'user_id'  
    ];

    public  function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function commentaires(): HasMany
    {
        return $this->hasMany(Commentaire::class);
    }

    public function financements(): HasMany
    {
        return $this->hasMany(Financement::class);
    }
    public function secteur()
    {
        return $this->belongsToMany(Secteur::class,'startup_secteur');
    }

    public  function phase(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Phase::class);
    }

    public function tag()
    {
        return $this->belongsToMany(Tag::class, 'startup_tag');
    }

    public function evolutionStartup(){
        return $this->hasMany(EvolutionStartup::class);
    }


}
