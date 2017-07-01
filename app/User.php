<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Hootlex\Friendships\Traits\Friendable;
use Lab404\Impersonate\Models\Impersonate;
use Laracasts\Presenter\PresentableTrait;

class User extends Authenticatable
{
    use Notifiable, Friendable, Impersonate, PresentableTrait;

    protected $presenter = 'App\Http\Presenter\UserPresenter';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'lastname', 'username'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	
	
	public function properties()
	{
		return $this->hasMany('App\Property');
	}
}
