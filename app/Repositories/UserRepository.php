<?php namespace App\Repositories;

use Illuminate\Http\Request;
use App\User;

class UserRepository extends Repository {

	public function __construct(User $user)
	{
		$this->model = $user;
	}

	public function search(Request $request)
	{
		$query = $this->model->orderBy('users.created_at', 'ASC');

		if ($request->has('search'))
		{
			$search = $request->get('search');

			$query->where('users.name', 'LIKE', '%' . $search . '%')
				->orWhere('users.email', 'LIKE', '%' . $search . '%')
			;
		}

		return $query->paginate(config('custom.paginate'));
	}

	public function save($id, $data)
	{
		if (isset($data['password'])) $data['password'] = bcrypt($data['password']);

		return parent::save($id, $data);
	}

}