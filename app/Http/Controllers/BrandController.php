<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\request('ajax')){

            return DataTables::of(Brand::all())->make();
        }
        return view('admin.brand.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $table = new Brand();
        $table->name = $request->name;
        $table->description = $request->description;
        $table->is_featured = $request->is_featured;
        
        if($request->file('thumbnail')){
            $dir = 'public/uploads/';
            $file = $request->file('thumbnail');
            $name = 'hl'.sha1(microtime()) . "." . $file->extension();
            $file->move($dir,$name);
            $table->thumbnail = $dir.$name;
        }
        $table->save();

        session()->flash('message.head', 'success');
        session()->flash('message.body','saved!');
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
        return view('admin.brand.edit',[
            'data'=> Brand::find($id),
            'categories'=>Brand::all()
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
        $table = Brand::find($id);
        $table->name = $request->name;
        $table->description = $request->description;
        $table->is_featured = $request->is_featured;
        if($request->file('thumbnail')){
            $dir = 'public/uploads/';
            $file = $request->file('thumbnail');
            $name = 'hl'.sha1(microtime()) . "." . $file->extension();
            $file->move($dir,$name);
            $table->thumbnail = $dir.$name;
        }

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
        $table = Brand::find($id);
        $table->delete();

        session()->flash('message.head', 'success');
        session()->flash('message.body','Deleted!');
        return back();
    }
}
