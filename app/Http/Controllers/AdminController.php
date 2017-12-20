<?php

namespace App\Http\Controllers;

use Closure;
use Illuminate\Support\Facades\Auth;
use Log;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth:admin');
    // }

    public function getSignin(){
        return view('admin.index');
    }

    public function postSignin(Request $request){
        // $this->validate($request, [
        //     'email' => 'email|required',
        //     'password' => 'required|min:4'
        // ]);

        // echo 'unooooooooooooooooooooo';

        if(Auth::guard('admin')->attempt(['email' => $request->email,
            'password' => $request->password])){
                return redirect()->route('admin.index');
            
        // echo 'sdasdasdasdasd';
        }
        // else
        // {
        //     throw new exception('User not found');
        // }
        return redirect()->back()->withErrors(['Warning:', 'The Email address and/or the password was incorrect.']);
        // echo 'nooooooooooooooooooooooooooooo';
    }
    
        public function getLogout(){
            Auth::guard('admin')->logout();
            return redirect()->route('product.index');
        }

}