<?php

namespace App\Models;

use App\Contrats\Likeable;
use App\Models\Concerns\Likes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


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

    public function commentaires(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Commentaire::class);
    }

    public function financements(): \Illuminate\Database\Eloquent\Relations\HasMany
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


}
