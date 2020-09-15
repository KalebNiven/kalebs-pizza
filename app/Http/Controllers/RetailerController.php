<?php

namespace App\Http\Controllers;

use App\Retailer;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RetailerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\request('ajax')){

            return DataTables::of(Retailer::all())->make();
        }
        return view('admin.retailer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.retailer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $table = new Retailer();
        $table->name = $request->name;
        $table->company = $request->company;
        $table->contact = $request->contact;
        $table->email = $request->email;
        $table->message = $request->message;
        $table->address = $request->address;
        
        $table->save();

        $data['send_to_email'] = env('ADMIN_EMAIL');
        $data['send_to_name'] = env('APP_NAME');
        $data['subject']       = "New Retailer Request";
        $data['r_name'] = $request->name;
        $data['r_company'] = $request->company;
        $data['r_email'] = $request->email;
        $data['r_contact'] = $request->contact;
        $data['r_address'] = $request->address;
        $data['r_message'] = $request->massage;

        // send email
        $emailController = new HomeController();
        $emailController->emailSend($data,'emails.retailer');

        session()->flash('message.head', 'success');
        session()->flash('message.body','send!');
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
        return view('admin.retailer.edit',[
            'data'=> Retailer::find($id),
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
        $table->company = $request->company;
        $table->contact = $request->contact;
        $table->email = $request->email;
        $table->message = $request->message;
        $table->address = $request->address;
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
        $table = Retailer::find($id);
        $table->delete();

        session()->flash('message.head', 'success');
        session()->flash('message.body','Deleted!');
        return back();
    }
}
