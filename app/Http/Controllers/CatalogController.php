<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Catalog;
use App\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\request('ajax')){

            return DataTables::of(Catalog::all())->make();
        }
        return view('admin.catalog.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.catalog.create',[
            'categories'=>Category::all(),
            'brands'=>Brand::all(),
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
        $table = new Catalog();
        $table->name = $request->name;
        $table->description = $request->description;
        if($request->file('thumbnail')){
            $dir = 'public/uploads/';
            $file = $request->file('thumbnail');
            $name = 'hl'.sha1(microtime()) . "." . $file->extension();
            $file->move($dir,$name);
            $table->thumbnail = $dir.$name;
        }
        if($request->file('thumbnail')){
            $dir = 'public/uploads/';
            $file = $request->file('pdf');
            $name = 'hl'.sha1(microtime()) . "." . $file->extension();
            $file->move($dir,$name);
            $table->pdf_link = $dir.$name;
        }
        $table->category_id = $request->category;
        $table->video_link = $request->video_link;
        $table->brand_id = $request->brand;
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
        return view('admin.catalog.edit',[
            'data'=> Catalog::find($id),
            'categories'=>Category::all(),
            'brands'=>Brand::all(),
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
        $table = Catalog::find($id);
        $table->name = $request->name;
        $table->description = $request->description;
        if($request->file('thumbnail')){
            $dir = 'public/uploads/';
            $file = $request->file('thumbnail');
            $name = 'hl'.sha1(microtime()) . "." . $file->extension();
            $file->move($dir,$name);
            $table->thumbnail = $dir.$name;
        }
        if($request->file('thumbnail')){
            $dir = 'public/uploads/';
            $file = $request->file('pdf');
            $name = 'hl'.sha1(microtime()) . "." . $file->extension();
            $file->move($dir,$name);
            $table->pdf_link = $dir.$name;
        }
        $table->brand_id = $request->brand;
        $table->video_link = $request->video_link;
        $table->category_id = $request->category;

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
        $table = Catalog::find($id);
        $table->delete();

        session()->flash('message.head', 'success');
        session()->flash('message.body','Deleted!');
        return back();
    }
}
