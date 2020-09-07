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

    const CREATED_AT = 'prep_date';
    const UPDATED_AT = 'mod_date';
    
    protected $fillable = [
        'name', 'email', 'password', 'role', 'prep_emp', 'prep_date', 'cancel_emp', 'cancel_date', 'mod_emp', 'mod_date'
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

    public function isAdmin()
    {
        if($this->role == 1){
            return true;
        }else{
            return false;
        }
       // return $this->role; // this looks for an admin column in your users table
    }
    public function isUser()
    {
        if($this->role == 2){
            return true;
        }else{
            return false;
        }
       // return $this->role; // this looks for an admin column in your users table
    }
}
