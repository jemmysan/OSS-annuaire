<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Financement extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'montant',
        'startup_id',

    ];

    public function startup()
    {
        return $this->belongsTo(Startup::class);
    }
}
