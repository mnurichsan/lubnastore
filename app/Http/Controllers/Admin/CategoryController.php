<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Category as AppCategory;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'name' => 'required|min:3|max:25'
        ], [
            'name.required' => 'Category harus di isi',
            'name.min' => 'Nama category minimal 3',
            'name.max' => 'Nama Category Maximal 25'
        ]);

        $categories = [
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ];

        Category::create($categories);
        return redirect()->route('category.index')->with('status', 'Berhasil di tambahkan');;
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
        $category = Category::findOrFail($id);

        return view('admin.category.edit', compact('category'));
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
            'name' => 'required|min:3|max:25'
        ], [
            'name.required' => 'Category harus di isi',
            'name.min' => 'Nama category minimal 3',
            'name.max' => 'Nama Category Maximal 25'
        ]);

        $categories = [
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ];

        Category::findOrFail($id)->update($categories);
        return redirect()->route('category.index')->with('status', 'Data berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::findOrFail($id)->delete();

        return redirect()->back()->with('status', 'Data berhasil di hapus');
    }
}
