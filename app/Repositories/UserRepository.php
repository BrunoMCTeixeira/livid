<?php

namespace App\Repositories;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\BaseRepository;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

use App\User;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
	protected $user;
	
	protected $model = User::class;

	public function __construct(User $user)
	{
	    $this->user = $user;
	}
	
	
	/**
	 * Make a new friendship request
	 * A user can't make a friendship request to himself
	 */
	public function addFriend($recipient)
	{
		if(Auth::id() != $recipient->id): 
			Auth::user()->befriend($recipient);
		endif;
	}
	
	/**
	 * Accept a friendship request
	 */
	public function acceptFriendship($sender)
	{
		Auth::user()->acceptFriendRequest($sender);
	}
	
	/**
	 * Deny a friendship request from another user
	 */
	public function denyFriendship($sender)
	{
		Auth::user()->denyFriendRequest($sender);
	}
	
	public function pendingFriendships()
	{
		return Auth::user()->getFriendRequests()->load('sender');
	}
	
}