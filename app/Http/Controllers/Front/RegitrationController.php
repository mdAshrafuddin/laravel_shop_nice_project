<?php

namespace App\Http\Controllers\Front;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegitrationController extends Controller
{
    public function index()
	{
		return view('front.registration.index');
	}

	public function store(Request $request)
	{
		//Validation

		$this->validate($request,[

			'name' => 'required',
			'email' => 'required|email',
			'password' => 'required|confirmed',
			'address' => 'required',
		]);

		//Save the data

		$user = User::create([


			'name' => $request->name,
			'email' => $request->email,
			'password' => bcrypt($request->password) ,
			'address' => $request->address,

		]);

		//sing the user in

		auth()->login($user);

		//Redirect to

		return redirect('/user/profile');
	}
}
