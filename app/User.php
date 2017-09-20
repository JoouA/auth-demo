<?php

namespace App;

use App\Events\AuthRegister;
use App\Events\UserRegistered;
use Illuminate\Notifications\Notifiable;
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
        'name', 'email', 'password','remember_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public static function register(array $attributes){
        $user = static::create($attributes);

        //调用event
        //调用了event事件之后，就会调用listener事件
        event(new UserRegistered($user));

    }
    /*
     * auth to register
     * */
    public  static  function zhuche(Array $data){
         $user = static::create($data);
         event(new AuthRegister($user));

    }

}
