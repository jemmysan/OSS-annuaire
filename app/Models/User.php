<?php

namespace App\Models;

use App\Contrats\Likeable;
use App\Models\Like;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Mpociot\Teamwork\Traits\UserHasTeams;
use Spatie\Permission\Traits\HasRoles;
use Haruncpi\LaravelUserActivity\Traits\Loggable;


class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    use HasRoles;
    use UserHasTeams;
    use Loggable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**
     * @var mixed
     */


    public function accompagnement(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Accompagnement::class);
    }

    public function financiere(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Financiere::class);
    }

    public function startup(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Startup::class);
    }

    public function likes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Like::class);
    }

    public function like(Likeable $likeable): self
    {
        if ($this->hasLiked($likeable)) {
            return $this;
        }

        (new Like())
            ->user()->associate($this)
            ->likeable()->associate($likeable)
            ->save();

        return $this;
    }

    public function unlike(Likeable $likeable): self
    {
        if (! $this->hasLiked($likeable)) {
            return $this;
        }

        $likeable->likes()
            ->whereHas('user', function ($q) {
                return $q->whereId($this->id);
            })
            ->delete();

        return $this;
    }

    public function hasLiked(Likeable $likeable): bool
    {
        if (! $likeable->exists) {
            return false;
        }

        return $likeable->likes()
            ->whereHas('user', function ($q) {
                return $q->whereId($this->id);
            })
            ->exists();
    }



}
