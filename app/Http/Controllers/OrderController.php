<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
	{
		$orders = Order::all();
		return view('admin.orders.index',compact('orders'));
	}

	public function confirm($id)
	{
		$order = Order::find($id);

		$order->update(['status' => 1]);

		session()->flash('msg','Order has been confirmed');

		return redirect('admin/orders');


	}

	public function  pending($id)
	{
		$orders = Order::find($id);

		$orders->update(['status' =>  0]);

		session()->flash('msg','Order has been pending');

		return redirect('admin/orders');
	}

	public function show($id)
	{
		$orders = Order::all();

		return view('admin.orders.details',compact('orders'));

	}


}
