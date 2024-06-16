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

    protected $fillable=[
        'evolution_id',
        'startup_id'
    ];

    protected $hidden = [
        'created_at',
        'deleted_at'
    ];

    public function evaluation() : BelongsTo{
        return $this->belongsTo(Evolution:: class,'evaluation_id');
    }

    public function startup(): BelongsTo{
        return $this->belongsTo(Startup::class,'startup_id');
    }

}
