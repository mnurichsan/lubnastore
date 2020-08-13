<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Alert;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category')->get();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories =  Category::all();
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'category_id' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png|max:2045',
            'price' => 'required',
        ]);

        $image = $request->image;
        $newImage = time() . $image->getClientOriginalName();
        $image->move('asset_admin/uploads/product', $newImage);

        $product = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'category_id' => $request->category_id,
            'description' => $request->description,
            'image' => 'asset_admin/uploads/product/' . $newImage,
            'price' => $request->price
        ];

        Product::create($product);
        toast('Data berhasil ditambah', 'success');
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::with('category')->findOrFail($id);
        $categories = Category::all();

        return view('admin.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'category_id' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpeg,jpg,png|max:2045',
            'price' => 'required',
        ]);

        if ($request->has('image')) {
            $image = $request->image;
            $newImage = time() . $image->getClientOriginalName();
            $image->move('asset_admin/uploads/product', $newImage);


            $product = [
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'category_id' => $request->category_id,
                'description' => $request->description,
                'image' => 'asset_admin/uploads/product/' . $newImage,
                'price' => $request->price
            ];

            $imagePath = Product::select('image')->where('id', $id)->first();
            $file_path = $imagePath->image;
            if (file_exists($file_path)) {
                unlink($file_path);
            }
        } else {
            $product = [
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'category_id' => $request->category_id,
                'description' => $request->description,
                'price' => $request->price
            ];
        }

        Product::findOrFail($id)->update($product);
        toast('Data berhasil di update', 'success');
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        toast('Data berhasil di hapus', 'success');
        return redirect()->route('product.index');
    }


    public function getTrashed()
    {
        $products = Product::onlyTrashed()->get();

        return view('admin.product.trashed', compact('products'));
    }

    public function restore($id)
    {
        Product::onlyTrashed()->findOrFail($id)->restore();
        toast('Data berhasil di restore', 'suceess');
        return redirect()->back();
    }

    public function kill($id)
    {
        $imagePath = Product::onlyTrashed()->select('image')->where('id', $id)->first();
        $file_path = $imagePath->image;
        if (file_exists($file_path)) {
            unlink($file_path);
        }

        Product::onlyTrashed()->findOrFail($id)->forceDelete();
        toast('Data berhasil di hapus', 'suceess');
        return redirect()->back();
    }
}
