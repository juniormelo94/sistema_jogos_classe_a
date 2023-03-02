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
    protected $fillable = [
        'name',
        'email', 
        'password',
        'data_visualizacao',
        'status',
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
    * Validation rules
    *
    * @var array
    */
    public $rules = [
        'name'              => 'required|min:3|max:20',
        'email'             => 'required|min:3|max:50|unique:users',
        'password'          => 'required|min:6|max:60',
        'data_visualizacao' => 'required',
        'status'            => 'required',
    ];

    /**
     * Get the phone record associated with the user.
     */
    public function dadosUsers()
    {
        return $this->hasMany('App\Models\DadosUsers', 'users_id');
    }
}
