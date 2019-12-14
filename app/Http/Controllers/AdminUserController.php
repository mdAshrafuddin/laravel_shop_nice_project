<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminUserController extends Controller
{

	public function __construct()
	{
		$this->middleware('guest:admin')->except('logout');
	}

	public function index()
	{
		return view('admin.login');
	}

	public function store(Request $request)
	{
		$this->validate($request,[

			'email' => 'required|email',
			'password' => 'required',

		]);

		// Log the user In
		$credentials = $request->only('email', 'password');

		if (!Auth::guard('admin')->attempt($credentials)) {

		  return redirect()->back()->withErrors([

		  	'message' => ' Wrong credentials please try again'

		  ]);

		  //Session Message

			session()->flash('msg', 'You Have been logged in');

		  //redirect

		  return redirect('/admin');

		}


	}

	public function logout()
	{
		auth()->guard('admin')->logout();

		session()->flash('msg', 'You have logged out');

		return redirect('admin/login');
	}
}
