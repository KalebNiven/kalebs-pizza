<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Catalog;
use App\Category;
use App\Contact;
use App\HomePage;
use App\Product;
use Illuminate\Http\Request;
use Mail;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('index',[
            'home'=>HomePage::find(1),
            'products'=>Product::where('is_featured',1)->take(8)->get(),
            'brands'=>Brand::where('is_featured',1)->take(5)->get()
        ]);
    }

    public function product($name, $id)
    {

        return view('product',[
            'product'=>Product::find($id)
        ]);
    }


    public function catalog_By_Brand(){
        return view('brand',[
            'brands'=>Brand::all()
        ]);
    }

    public function catalog_By_Category(){
        return view('category',[
            'categories'=>Category::all()
        ]);
    }

    public function catalogs(){
        if(!request('dir')){return back();}

        $dir = request('dir');
        $id  = request('i');

        if($dir == 'brand'){
          return view('catalogs',[
              'catalogs' => Catalog::where('brand_id',$id)->paginate(10)->appends(request()->query()),
              'parent'    => Brand::find($id)
            ]);
        }if($dir  == 'category'){
            return view('catalogs',[
                'catalogs' => Catalog::where('category_id',$id)->paginate(10)->appends(request()->query()),
                'parent' => Category::find($id)
            ]);
        }
    }

    public function retailer(){
        return view('retailer');
    }

    public function contact(){
        return view('contact',[
            'contacts'=>Contact::all()
        ]);
    }


    public function search(){
        $q = '%'.request('q').'%';

        return view('search',[
            'catalogs'=> $query = DB::table('catalogs')
                        ->join('brands','catalogs.brand_id','catalogs.id')
                        ->join('categories','catalogs.category_id','categories.id')
                        ->where('catalogs.name','LIKE',$q)
                        ->Orwhere('categories.name','LIKE',$q)
                        ->Orwhere('brands.name','LIKE',$q)
                        ->get(['catalogs.*'])
        ]);


    }



    public function logout(){

    }


    public function emailSend($data,$view)
    {
            Mail::send($view, $data, function($message) use ($data) {
                $message->subject($data['subject']);
                $message->to($data['send_to_email'], $data['send_to_name']);
            });

            return 1;
    }


}
