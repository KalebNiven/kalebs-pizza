<?php

namespace App\Http\Controllers;

use App\Catalog;
use App\Category;
use App\Order;
use App\Setting;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.setting',[
            'data'=> Setting::find(1)
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
        $table = Setting::find(1);
        $table->email = $request->email;
        $table->contact = $request->contact;
        $table->facebook_link = $request->facebook_link;
        $table->twitter_link = $request->twitter_link;
        $table->instagram_link = $request->instagram_link;
        $table->linkedin_link = $request->linkedin_link;

        $dir = 'public/uploads/';

        if($request->file('header_logo')){
            $file = $request->file('header_logo');
            $name = 'hl'.sha1(microtime()) . "." . $file->extension();
            $file->move($dir,$name);
            $table->header_logo = $dir.$name;
        }
        if($request->file('footer_logo')){
            $file = $request->file('footer_logo');
            $name = 'fl'.sha1(microtime()) . "." . $file->extension();
            $file->move($dir,$name);
            $table->footer_logo = $dir.$name;
        }

        $table->save();



        session()->flash('message.head', 'success');
        session()->flash('message.body','Updated!');
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function order_admin(){
        return view('admin.order',[
            'table'=>Order::paginate(10)
        ]);
    }
}
