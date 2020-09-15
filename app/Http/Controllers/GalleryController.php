<?php

namespace App\Http\Controllers;

use App\Category;
use App\Gallery;
use Illuminate\Http\Request;
use File;

class GalleryController extends Controller
{
    public function index(){
        if(request('count')){
            return  Gallery::latest()->take(request('count'))->get();
        }

        $page = request('page');
        $take = 12;
        $skip = $page * $take;
        return  Gallery::oldest()->where('id','>',intval(request('id')))->take(12)->get();

    }
    public function create(){
        return view('admin.category.create');
    }
    public function store(Request $request){

        $countfiles = count($request->gallery_image);
        for($i = 0;$i < $countfiles; $i++){
            $file = $request->file('gallery_image')[$i];
            $name = 'g'.sha1(microtime()) . "." . $file->extension();
            $file->move('public/uploads/',$name);

            $table = new Gallery();
            $table->name = $name;

            if(!auth()->guard('admin')->check()){
                $table->guest = session('guest');
            }
            $table->path = 'public/uploads/'.$name;
            $table->save();
        }
        return 1;
    }
    public function edit($id){

    }
    public function show(){

    }
    public function update(Request $request, $id){

    }
    public function destroy($id){
        $file = Gallery::find($id);
        File::delete($file->path);
        $file->delete();
    }

}
