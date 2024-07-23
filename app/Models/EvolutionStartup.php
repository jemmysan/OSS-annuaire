<?php

namespace App\Models;

use App\Models\Startup;
use App\Models\Evolution;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EvolutionStartup extends Model
{
    use HasFactory;

    protected $fillable = [
        'evolution_id',
        'startup_id',
        'description',
        'filename' // Assurez-vous que cet attribut correspond à votre base de données
    ];

    protected $hidden = [
        'created_at',
        'deleted_at'
    ];

    public function evaluation(): BelongsTo
    {
        return $this->belongsTo(Evolution::class, 'evolution_id');
    }

    public function startup(): BelongsTo
    {
        return $this->belongsTo(Startup::class, 'startup_id');
    }

    public function getFilenamesAttribute($value)
    {
        return json_decode($value, true) ?: []; // Return an empty array if not valid JSON
    }

    public function setFilenamesAttribute($value)
    {
        $this->attributes['filename'] = json_encode($value); // Encode array to JSON
    }

}
