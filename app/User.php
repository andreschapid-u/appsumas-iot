<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'email', 'password', 'role_id',
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

    public function devices()
    {
        return $this->hasMany(Device::class, 'user_id', 'id');
    }
    public function role(){
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }
    public function children()
    {
        return $this->hasMany(Child::class, 'user_id', 'id');
    }
    public function challenges()
    {
        return $this->hasMany(Challenge::class, 'user_id', 'id');
    }

    public function isAdmin()
    {
        return $this->person->role->is('Administrador');
    }
    public function isTutor()
    {
        return $this->person->role->is('Tutor');
    }
    public function isJugador()
    {
        return $this->person->role->is('Jugador');
    }
}
