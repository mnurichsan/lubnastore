<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;


class lubnaStoreController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $category = Category::all();
        return view('index', compact('products', 'category'));
    }

    public function getProduct($slug)
    {
        $detailProduct = Product::with('category')->where('slug', $slug)->firstOrFail();
        $category = Category::all();
        return view('product', compact('detailProduct', 'category'));
    }

    public function cart()
    {
        $cartData = \Cart::content();
        $category = Category::all();
        return view('cart', compact('cartData', 'category'));
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

    public function checkout()
    {
        $category = Category::all();
        return view('user.checkout', compact('category'));
    }
}
