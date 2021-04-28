<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // on définit la table users
    protected $table = 'users';
    protected $fillable = [
        'firstname', 'lastname', 'email', 'password', 'id'
    ];
    protected $primaryKey = 'id'; //primary key de user




    public function boards()
    {
        return $this->hasMany('App\Board')->orderBy('created_at', 'DESC');
    }
}
