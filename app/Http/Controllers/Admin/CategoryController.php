<?php

namespace App\Http\Controllers\Admin;


use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Alert;

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
        toast('Berhasil Di Tambah', 'success');
        return redirect()->route('category.index');
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
        toast('Berhasil Di Edit', 'success');
        return redirect()->route('category.index');
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
        toast('Berhasil Di Hapus', 'success');
        return redirect()->back()->with('status', 'Data berhasil di hapus');
    }

    public function getTrashed()
    {
        $categories = Category::onlyTrashed()->get();
        return view('admin.category.trashed', compact('categories'));
    }

    public function restore($id)
    {
        Category::onlyTrashed()->findOrFail($id)->restore();
        toast('Data berhasil di restore', 'success');
        return redirect()->back();
    }

    public function kill($id)
    {
        Category::onlyTrashed()->findOrFail($id)->forceDelete();
        toast('Data berhasil di delete permanen', 'success');
        return redirect()->back();
    }
}
