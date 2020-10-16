<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use \Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
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
     * A user can have only one trainer. (For now, can be changed to have many trainers (accounts) later.)
     *
     * @return HasOne
     */
    public function trainer(): HasOne
    {
        return $this->hasOne(Trainer::class);
    }

    /**
     * A user belongs to an access level. (Since it has the foreign key we use 'BelongsTo')
     *
     * @return BelongsTo
     */
    public function accessLevel(): BelongsTo
    {
        return $this->BelongsTo(AccessLevel::class);
    }

    /**
     * Check if the user is Admin.
     *
     * @return String
     */
    public function isAdmin(): String
    {
        if ($this->AccessLevel->label === "admin")
        {
            return $this->AccessLevel->label;
        }
        return "false";
    }
}
