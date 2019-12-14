<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use Illuminate\Http\Request;

class UsersCntroller extends Controller
{
    public function index()
	{
		$users = User::all();
		return view('admin.users.index',compact('users'));
	}

	public function show($id)
	{
		$orders = Order::all();

		return view('admin.users.details',compact('orders'));
	}
}
