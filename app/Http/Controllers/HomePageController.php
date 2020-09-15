<?php

namespace App\Http\Controllers;

use App\HomePage;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class HomePageController extends Controller
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
    //  return HomePage::find(1);
        return view('admin.home-page',[
            'data'=> HomePage::find(1)
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
        $table = HomePage::find(1);
        $table->thumbnail = substr($request->gallery, 0, -1);
        $table->video_link = $request->video_link;
        $table->text_1 = $request->text_1;
        $table->text_2 = $request->text_2;
        $table->text_3 = $request->text_3;
        $table->btn_text = $request->btn_text;
        $table->btn_link = $request->btn_link;





        $dir = 'public/uploads/';

        if($request->file('right_top_banner')){
            $file = $request->file('right_top_banner');
            $name = 'rtb'.sha1(microtime()) . "." . $file->extension();
            $file->move($dir,$name);
            $table->right_top_banner = $dir.$name;
        }
        if($request->file('right_bottom_banner')){
            $file = $request->file('right_bottom_banner');
            $name = 'rbb'.sha1(microtime()) . "." . $file->extension();
            $file->move($dir,$name);
            $table->right_bottom_banner = $dir.$name;
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
}
