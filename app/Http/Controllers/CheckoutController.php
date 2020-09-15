<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Catalog;
use App\Category;
use App\Order;
use App\OrderLog;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Cart;
use Auth;

class CheckoutController  extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('checkout');
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
            // fore guest user
            $user_id = 0;
            if(Auth::check()){
                $user_id  = auth()->user()->id;
            }

            $order = new Order();
            $order->user_id = $user_id;
            $order->email   = $request->email;
            $order->name = $request->name;
            $order->email = $request->email;
            $order->country = $request->country;
            $order->city = $request->city;
            $order->zipcode = $request->zipcode;
            $order->address = $request->address;
            $order->save();

            foreach(Cart::getContent() as $i){
                $log = new OrderLog();
                $log->order_id = $order->id;
                $log->product_id = $i->attributes['id'];
                $log->product_name = $i->name;
                $log->price      = $i->price;
                $log->quantity   = $i->quantity;
                $log->save();
            }


            Cart::clear();
            session()->flash('message.head', 'cart');
            session()->flash('message.body','Order placed successfully!');
            return view('thanks',[
                'order'=>$order
            ]);


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
