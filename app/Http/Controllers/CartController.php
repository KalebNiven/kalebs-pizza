<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Catalog;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cart');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::find($request->id);
        Cart::add([
            'id'   => uniqid(),
            'name' => $product->name,
            'quantity' => $request->qty ,
            'price'    => floatval($product->price) ,
            'attributes' => [
                'image'  => $product->thumbnail,
                'id'     => $product->id
                ]
             ]);
        return 1;
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
        foreach($request->qty as $k=>$q){
            Cart::update($request->id[$k], array(
                'quantity' => [ 'relative'=>false,'value'=>$q ], // so if the current product has a quantity of 4, another 2 will be added so this will result to 6
              ));
        }

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
        Cart::remove($id);
        return back();

    }
}
