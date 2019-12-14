<?php

namespace App\Http\Controllers;
use File;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
	{
		$products = Product::latest()->get();
		return view('admin.products.index',compact('products'));
	}

	public function create()
	{
		$products = Product::all();
		return view('admin.products.create',compact('products'));
	}

	public function store(Request $request)
	{
		$this->validate($request,[

			'name' => 'required',
			'price' => 'required',
			'desc(ription' => 'required',
			'image' => 'required|mimes:jpeg,bmp,png,gif,svg,pdf',


		]);
		$image = $request->file('image');

		$slug = str_slug($request->name);

		if (isset($image))
		{
			$currentDate = Carbon::now()->toDateString();

			$iamgeName = $slug.'-'.$currentDate.'-'.uniqid().'-'.
				$image->getClientOriginalName();

			if (!file_exists('uploads'))
			{
				mkdir('uploads', 0777,true);
			}
			$image->move('uploads/', $iamgeName);
		}else{
			$iamgeName = "Default.png";
		}
//Save The data into database
		Product::create([

			'name' => $request->name,
			'price' => $request->price,
			'description' => $request->description,
			'image' => $iamgeName,
			'slug' => str_slug($request->name),


		]);


		//Session Message

		$request->session()->flash('msg','Your Product has been added');

		///Redirect

		return redirect('products/create');
	}

	public function edit($id)
	{
		$products = Product::find($id);

		return view('admin.products.edit',compact('products'));
	}

	public function update(Request $request, $id)
	{
		$this->validate($request,[

			'name' => 'required',
			'price' => 'required',
			'description' => 'required',
			'image' => 'required|mimes:jpeg,bmp,png,gif,svg,pdf',
		]);

		$image = $request->file('image');

		$slug = str_slug($request->name);

		if (isset($image))
		{
			$currentDate = Carbon::now()->toDateString();

			$iamgeName = $slug.'-'.$currentDate.'-'.uniqid().'-'.
				$image->getClientOriginalName();

			if (!file_exists('uploads'))
			{
				mkdir('uploads', 0777,true);
			}
			$image->move('uploads/', $iamgeName);
		}else{
			$iamgeName = $product->image;
		}

		//Uploading the product

		$product->update([

			'name' 			=> $request->name,
			'price' 		=> $request->price,
			'description' 	=> $request->description,
			'image'       	=> $iamgeName,
			'slug'        	=> str_slug($request->name),
		]);

		//Store a message

		$request->session()->flash('msg','Your Product has been deleted');

		//Redirect back
		return redirect('admin/products');
	}

	public function show($id)
	{

		$products = Product::find($id);

		return view('admin.products.deatils',compact('products'));

	}

	public function destroy($id)
	{
		//Delete The product
		$products = Product::find($id);

		$products->delete();

		//Store a message
		session()->flash('msg','Your Product has been deleted');

		//Redirect back
		return redirect()->back();
	}

}
