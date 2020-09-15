<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Catalog;
use App\Category;
use App\Setting;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Auth;
use Hash;

class ProfileController extends Controller
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
        return view('admin.profile');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'email' => 'required',
        ]);

        if($request->new_password){
            $this->validate($request, [
                'new_password' => ['required'],
                'new_confirm_password' => ['same:new_password'],
                'username'=> ['required'],
            ]);
        }
        $user = auth()->user();
           $hashedPassword = Auth::user()->password;
           if (\Hash::check($request->old_password , $hashedPassword )) {
            $user->email = $request->email;
            $user->name = $request->username;
             if (!\Hash::check($request->new_password , $hashedPassword)) {
                  $user->password = bcrypt($request->new_password);
                }
                else{
                    session()->flash('message.head', 'danger');
                    session()->flash('message.body','New password can not be the old password!');
                    return back();
                    }
               }
              else{
                session()->flash('message.head', 'danger');
                session()->flash('message.body','Old password doesnt matched!');
                return back();
                 }

                 $user->save();

        session()->flash('message.head', 'success');
        session()->flash('message.body','Saved!');
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
