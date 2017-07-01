<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Http\Request;
use App\User;

class FriendshipsController extends Controller
{
	
	public function __construct(UserRepositoryInterface $user)
    {
		$this->user = $user;
    }

    public function index()
    {
        $friendships = $this->user->pendingFriendships();
		return view('features.users.friends.index', compact('friendships'));
    }

    public function create(User $user)
    {
        return $this->user->addFriend($user);
    }
	
	public function store(Request $request)
    {
		$user = $this->user->findByID($request->user);
		
        return $this->user->acceptFriendship($user);
    }

    public function destroy(User $user)
    {
        return $this->user->denyFriendship($user);
    }
}
