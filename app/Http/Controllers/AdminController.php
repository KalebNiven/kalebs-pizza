<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Auth;
use App\Contact;
use App\ContactTop;
use App\Order;
use App\Product;
use App\User;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $data['order'] = Order::count();
        $data['user'] = User::count();
        $data['product'] = Product::count();
        $data['cats'] = Category::count();
        return view('admin.index',$data);
    }

    public function loginForm(){
        return view('auth.admin-login');
    }

    public function login(Request $request){

        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect(route('admin.index'));
        }
        return redirect()->back()->withInput($request->only('email'));

    }



    public function logout(){
        auth('admin')->logout();
        return 1;
    }
}
