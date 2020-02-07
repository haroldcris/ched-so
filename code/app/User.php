<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use \Hashids\Hashids;
use App\Traits\HashTraits;

class User extends Authenticatable
{
    use Notifiable;
    use HashTraits;

    protected $fillable = [
        'username', 'email', 'password', 'role', 'schoolcode'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function School()
    {
        return $this->hasOne('App\Models\School','code','schoolcode');
    }
}
