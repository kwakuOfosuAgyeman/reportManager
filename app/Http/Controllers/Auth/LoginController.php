<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\Official_Address;
//use App\Models\Sports_Official;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    //use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('auth.login');
    }

    public function index1()
    {
        return view('auth.customerlogin');
    }

    public function index2()
    {
        return view('auth.adminlogin');
    }

    function userlogin(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:7'
        ]);

        $credentials = $request->only('email', 'password');

        if(Auth::guard('web')->attempt($credentials)){
            return redirect()->route('user.home');
        }else {
            return back()->with('error', 'Your email or pasword is incorrect');

        }
    }

    function customerlogin(Request $request){

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:7'
        ]);

        $credentials = $request->only('email', 'password');
        if(Auth::guard('customer')->attempt($credentials)){
            return redirect()->route('customer.home');
        }
        return back()->with('errpr', 'Your email or pasword is incorrect');
    }

    function adminlogin(Request $request){

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:7'
        ]);

        $credentials = $request->only('email', 'password');
        if(Auth::guard('admin')->attempt($credentials)){
            return redirect()->route('admin.home');
        }
        return back()->with('error', 'Your email or pasword is incorrect');
    }



}
