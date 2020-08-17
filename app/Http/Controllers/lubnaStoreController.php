<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;


class lubnaStoreController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('index', compact('products'));
    }

    public function getProduct($slug)
    {
        $detailProduct = Product::with('category')->where('slug', $slug)->firstOrFail();
        return view('product', compact('detailProduct'));
    }

    public function cart()
    {
        $cartData = \Cart::content();
        return view('cart', compact('cartData'));
    }

    public function cartStore(Request $request)
    {
        \Cart::add($request->id, $request->name, $request->qty, $request->price)->associate('App\Product');

        return redirect()->route('cart.index');
    }

    public function cartDestroy($id)
    {
        \Cart::remove($id);

        return redirect()->back();
    }
}
