<?php

namespace App\Repositories\Contracts;

interface UserRepositoryInterface
{
	public function addFriend($recipient);
	public function acceptFriendship($sender);
	public function denyFriendship($sender);
	public function pendingFriendships();
}

?>