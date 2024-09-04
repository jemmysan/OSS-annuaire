<?php

namespace App\Models;

use App\Models\Startup;
use App\Models\UniteMesure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StartupIndicateur extends Model
{
    use HasFactory;

    protected $fillable = [
        'startup_id',
        'indicateur_id',
        'date',
        'value'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function startup(){
        return $this->belongsTo(Startup::class, 'startup_id');
    }
    public function indicateur(){
        return $this->belongsTo(Indicateur::class,'indicateur_id');
    }

    
}
