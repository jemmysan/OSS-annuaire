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
        'filename'
    ];

    protected $hidden = [
        'created_at',
        'deleted_at'
    ];

    public function evaluation(): BelongsTo
    {
        return $this->belongsTo(Evolution::class, 'evaluation_id');
    }

    public function startup(): BelongsTo
    {
        return $this->belongsTo(Startup::class, 'startup_id');
    }

    // Accessor to decode the filenames from JSON
    public function getFilenamesAttribute($value)
    {
        return json_decode($value, true) ?: []; // Return an empty array if not JSON or invalid
    }

    // Mutator to encode the filenames array into JSON before saving
    public function setFilenamesAttribute($value)
    {
        $this->attributes['filename'] = json_encode($value);
    }
}
