<?php
namespace APP\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller{
	public function index()
	{
		$email = substr(str_shuffle('abcdefghijklmnopqrstyvwxyz'), 0, 8) . 'yyy.com';
		User::insert(['name' => 'yamada taro', 'email' => $email, 'password' => 'xxxxxxxx']);

		$users = User::all();
		return view('user', ['users' => $users]);
	}
}