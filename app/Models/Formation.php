<?php

namespace App\Models;

use App\Models\Rubrique;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Formation extends Model
{
    use HasFactory;

    protected $fillable = [
        'rubrique_id',
        'title',
        'lien_video',
        'content'
    ];



    public function rubrique() : BelongsTo{
        return $this->belongsTo(Rubrique::class,'rubrique_id');
    }

    
}
