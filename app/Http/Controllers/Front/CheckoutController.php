<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Cartalyst\Stripe\Laravel\Facades\Stripe;

use Exception;
use Gloudemans\Shoppingcart\Facades\Cart;

use Illuminate\Http\Request;


class CheckoutController extends Controller
{
	public function index()
	{
		return view('front.checkout.index');
	}

	public function store(Request $request){

		try{

		Stripe::charges()->create([

				'amount' => Cart::total(),
				'currency' => 'USD',
				'source'  => $request->stripeToken,
				'description' => 'Some text',

				'metadata' => [

				]

			]);

			return redirect()->back()->with('msg','Success Thank You');

		}catch(Exception $e){

		}
	}

}
