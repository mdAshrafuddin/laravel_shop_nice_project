<?php

namespace App\Http\Controllers\Front;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    public function index()
	{
		return view('front.cart.index');
	}

	public function store(Request $request)
	{
		$dubl = Cart::search(function ($cartItem, $rowId) use($request){

			return $cartItem->id === $request->id;

		});

		if ($dubl->isNotEmpty()){
			return redirect()->back()->with('msg', 'Item is already in your cart  ');
		}


		Cart::add($request->id,$request->name, 1, $request->price)->associate('App\Product');

		return redirect()->back()->with('msg', 'Item has Been Added to Cart');

	}

	public function destroy($id)
	{
		Cart::remove($id);

		return redirect()->back()->with('msg', 'Item has Been Delete Successfully  to Cart');

	}

		public function saveLater($id)
	{
		$item = Cart::get($id);

		$dubl = Cart::instance('saveForLater')->search(function ($cartItem, $rowId) use($id){

			return $cartItem->id === $id;

		});

		if ($dubl->isNotEmpty()){
			return redirect()->back()->with('msg', 'Item is save for later ');
		}

		Cart::remove($id);

		Cart::instance('saveForLater')->add($item->id, $item->name, 1, $item->price)->associate('App\Product');

		return redirect()->back()->with('msg', 'Item has Been saved for later');


	}
}
