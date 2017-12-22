<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Purchase;

class UserController extends Controller
{
    public function getSignup(){
        return view('user.signup');
    }

    public function postSignup(Request $request){
        $this->validate($request, [
            'user_id' => 'required|unique:users,user_id',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'email|required|unique:users',
            'password' => 'required|min:4'
        ]);

        // $user = new User([
        //     'user_id' => $request->input('user_id'),
        //     'first_name' =>$request->input('first_name'),
        //     'last_name' => $request->input('last_name'),
        //     'email' => $request->input('email'),
        //     'password' => bcrypt($request->input('password')),
        //     'miss_count' => 0,
        //     'remember_token' => 'n'
        // ]);

        $user = new User;
        $user->user_id = $request->user_id;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->miss_count = 0;
        $user->remember_token = 'n';


        $user->save();

        Auth::login($user);

        // return back()->with('success', 'product.index');
        return redirect()->route('product.index');
    }

    public function getSignin(){
        return view('user.signin');
    }

    public function postSignin(Request $request){
        $this->validate($request, [
            'email' => 'email|required',
            'password' => 'required|min:4'
        ]);

        $miss = User::where('email','=', $request->email)->select('miss_count')->first()->miss_count;

        if( $miss < 3 ){
            if(Auth::attempt(['email' => $request->email,
                'password' => $request->password])){
                    $user = new User;
                    $user = User::Where('email', $request->email)->first();
                    $user->miss_count = 0;
                    $user->save();
                    return redirect()->route('product.index');
            }
            else{
                $user = new User;
                $user = User::Where('email', $request->email)->first();
                $user->miss_count = $miss+1;
                // User::Where('email', $request->email)->update(['miss_count' => $user->miss_count]);
                
                // print_r($user->miss_count);
        
                $user->save();                
            }
        }
        else{
            return redirect()->back()->withErrors(['Warning:', 'The Email address has been blocked.']);
        }

        return redirect()->back()->withErrors(['Warning:', 'The Email address and/or the password was incorrect.']);
    }

    public function getProfile(){
        // $purchases = Auth::user()->purchases;
        // print_r($purchases);
        $purchases = Purchase::with('user')->get();
        // print_r($purchases);
        $purchases->transform(function($puchase, $key){
            $puchase->cart = unserialize($puchase->cart);
        });
        return view('user.profile', ['purchases' => $purchases]);
    }

    public function getLogout(){
        Auth::logout();
        return redirect()->back();
    }
}
