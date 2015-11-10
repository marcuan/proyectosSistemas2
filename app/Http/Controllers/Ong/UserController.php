<?php

namespace RED\Http\Controllers\Ong;

use Auth;
use Redirector;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use RED\Http\Controllers\Auth\AuthController;
use RED\Http\Requests;
use RED\Http\Controllers\Controller;
use RED\Ong\User;

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

		$authUser = Auth::user();

		return view('auth.usuariosindex', compact('users', 'authUser'));
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
			'admin' => $request->has('admin'),
		]);

		return redirect('/users/')->with('message', 'store');
	}

	public function cambiarEstatus($id, $status) {
		$usuario = User::find($id);

		$usuario->admin = $status;
		$usuario->save();

		return redirect('/users/')->with('message', 'cambioStatus');
	}

	public function listarPrivilegios($id) {
		$usuario = User::find($id);

		$acl = explode(';', $usuario->acl);
		$privilegios = array();
		foreach ($acl as $key => $privilegio) {
			$privilegios[$privilegio] = true;
		}

		return view('auth.privilegios', compact('usuario', 'privilegios'));
	}

	public function storePrivilegios(Request $request) {
		$usuario = User::find($request['usuario_id']);
		$privilegios = array_keys($request->all());

		$acl="";
		foreach ($privilegios as $key => $privilegio) {
			$acl .= $privilegio.";";
		}
		$usuario->acl = $acl;

		$usuario->save();

		return redirect('/user/privileges/'.$usuario->id)->with('message', 'actualizadoACL');
	}
}