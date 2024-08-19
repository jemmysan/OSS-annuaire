<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StatutStartup extends Model
{
    use HasFactory;

    protected $fillable = [
        'statut_id',
        'startup_id'
    ];

    protected $hidden = [
        'created_at',
        'deleted_at'
    ];

    public function statut()
    {
        return $this->belongsTo(Statut::class, 'statut_id');
    }

    public function startup()
    {
        return $this->belongsTo(Startup::class, 'startup_id');
    }
    
}
