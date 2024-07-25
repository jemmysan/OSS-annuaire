<?php

namespace App\Models;

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
        return $this->belongsTo(Evolution::class, 'evolution_id');
    }

    public function startup(): BelongsTo
    {
        return $this->belongsTo(Startup::class, 'startup_id');
    }

    public function getFilenameAttribute($value)
    {
        return json_decode($value, true) ?: [];
    }

    public function setFilenameAttribute($value)
    {
        $this->attributes['filename'] = json_encode($value);
    }
}
