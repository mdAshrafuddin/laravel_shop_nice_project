<?php

namespace App\Http\Controllers\Front;

use App\Order;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
	{
		$id = auth()->user()->id;

		$user = User::where('id', $id)->first();
		return view('front.profile.index',compact('user'));
	}

	public function show($id)
	{
		$orders = Order::all();
		return view('front.profile.details',compact('orders'));
	}
}
