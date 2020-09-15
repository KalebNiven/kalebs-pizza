<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\request('ajax')){

            return DataTables::of(Contact::all())->make();
        }
        return view('admin.contact.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contact.create',[
            'categories'=>Contact::all()
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
        $table = new Contact();
        $table->country = $request->country;
        $table->city = $request->city;
        $table->phone1 = $request->phone1;
        $table->phone2 = $request->phone2;
        $table->email = $request->email;
         $table->name = $request->name;
          $table->address = $request->address;
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
        return view('admin.contact.edit',[
            'data'=> Contact::find($id),
            'categories'=>Contact::all()
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
        $table = Contact::find($id);
        $table->country = $request->country;
        $table->city = $request->city;
        $table->phone1 = $request->phone1;
        $table->phone2 = $request->phone2;
        $table->email = $request->email;
                 $table->name = $request->name;
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
        $table = Contact::find($id);
        $table->delete();

        session()->flash('message.head', 'success');
        session()->flash('message.body','Deleted!');
        return back();
    }
}
