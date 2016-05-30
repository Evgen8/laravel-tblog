<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $casts = [
        'is_admin' => 'boolean',
    ];

    public function isAdmin()
    {
        return $this->is_admin;
    }
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    static  function createAdmin(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'tel' => $data['tel'],
            'password' => bcrypt($data['password']),
            'is_admin' => 1,
        ]);
    }

    protected $fillable = [
        'name', 'email', 'tel', 'password', 'is_admin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
