<?php

namespace App\Models;

use App\Models\Startup;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Secteur extends Model
{
    use HasFactory;
    protected $fillable = [
        'secteur',
    ];


    public function startup()
    {
        return $this->belongsToMany(Startup::class,'startup_secteur');
    }
}
