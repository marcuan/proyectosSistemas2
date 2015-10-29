<?php

namespace RED\Http\Controllers\Ong;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use RED\Http\Controllers\Auth\AuthController;
use Validator;
use Redirector;
use RED\Ong\User;
use RED\Http\Requests;
use RED\Http\Controllers\Controller;

class UserController extends Controller
{
	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data)
	{
		return Validator::make($data, [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
		]);
	}

	/**
	 * Displays all the users registered in the system.
	 *
	 * @return view
	 */
	public function index(Request $request)
	{
		// retrieves all users excluding the admin user
		$users = User::where('id', '!=', '1')->orderBy('id','DESC')->paginate(10);

		return view('auth.usuariosindex', compact('users'));
	}

	/**
	 * Show the application registration form.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('auth.register');
	}

	/**
	 * Show the application registration form.
	 *
	 * @return view
	 */
	public function store(Request $request)
	{
		$validator = $this->validator($request->all());

		if ($validator->fails()) {
			$this->throwValidationException(
				$request, $validator
			);
		}

		User::create([
			'name' => $request['name'],
			'email' => $request['email'],
			'password' => bcrypt($request['password']),
		]);

		return redirect('/users/')->with('message', 'store');
	}

}