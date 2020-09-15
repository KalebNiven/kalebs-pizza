<?php

namespace App\Http\Controllers;

use App\Product;
use App\Catalog;
use App\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\request('ajax')){

            return DataTables::of(Product::all())->make();
        }
        return view('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create',[
            'categories'=>Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $table = new Product();
        $table->name = $request->name;
        $table->description = $request->description;
        if($request->file('thumbnail')){
            $dir = 'public/uploads/';
            $file = $request->file('thumbnail');
            $name = 'hl'.sha1(microtime()) . "." . $file->extension();
            $file->move($dir,$name);
            $table->thumbnail = $dir.$name;
        }
        $table->category_id = $request->category;
        $table->price = $request->price;
        $table->is_featured = $request->is_featured;
        $table->save();

        session()->flash('message.head', 'success');
        session()->flash('message.body','Saved!');
        return back();

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
        return view('admin.product.edit',[
            'data'=> Product::find($id),
            'categories'=>Category::all()
        ]);
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
        $table = Product::find($id);
        $table->name = $request->name;
        $table->description = $request->description;
        if($request->file('thumbnail')){
            $dir = 'public/uploads/';
            $file = $request->file('thumbnail');
            $name = 'hl'.sha1(microtime()) . "." . $file->extension();
            $file->move($dir,$name);
            $table->thumbnail = $dir.$name;
        }
        $table->price = $request->price;
        $table->category_id = $request->category;
        $table->is_featured = $request->is_featured;

        $table->save();

        session()->flash('message.head', 'success');
        session()->flash('message.body','Updated!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $table = Product::find($id);
        $table->delete();

        session()->flash('message.head', 'success');
        session()->flash('message.body','Deleted!');
        return back();
    }
}
