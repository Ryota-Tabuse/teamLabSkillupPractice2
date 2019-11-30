<?php
namespace APP\Http\Controllers;

use App\Http\Controllers\Controller;

class UserController extends Controller{
	public function index()
	{
		$name = 'yamada taro';
		return view('user', ['name' => $name]);
	}
}