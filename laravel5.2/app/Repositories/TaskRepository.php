<?php

namespace App\Repositories;

use App\User;
use App\Task;

class TaskRepository{
	//可以加入共用的查询

	public function forUser(User $user){
		return Task::where('user_id', $user->id)
			->orderBy('created_at', 'asc')
			->get();
	}
}