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
}
