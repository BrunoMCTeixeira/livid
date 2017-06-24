<?php

namespace App\Repositories;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\BaseRepository;

use App\User;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
	protected $user;
	
	protected $model = User::class;

	public function __construct(User $user)
	{
	    $this->user = $user;
	}
}