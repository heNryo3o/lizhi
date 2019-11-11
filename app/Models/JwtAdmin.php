<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Auth;
use Tymon\JWTAuth\Contracts\JWTSubject;

class JwtAdmin extends Auth implements JWTSubject
{
    use Notifiable;

    protected $table = 'admins';

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

}
