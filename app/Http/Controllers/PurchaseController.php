<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
use App\Cart;
use App\Purchase;
use Auth;
use Carbon\Carbon;

class PurchaseController extends Controller
{
    public function getPurchase(){
        if(!session::has('cart')){
            return view('shop.shopping-cart', ['products' => null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shop.checkout', ['products' => $cart->items,'totalPrice' => $cart->totalPrice]);
    }

    public function postPurchase(Request $request){
        if(!session::has('cart')){
            return view('shop.shopping-cart', ['products' => null]);
        }
        try{
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        // return view('/', ['products' => $cart->items,'totalPrice' => $cart->totalPrice]);
        $purchase = new Purchase();
        $purchase->user_id = Auth::user()->user_id;
        $purchase->purchase_date = Carbon::now()->format('Y-m-d H:m:s');
        $purchase->payment_type = $request['radio'];
        // print_r($purchase->purchase_date);
        $purchase->save();
        $cart = null;
        $oldCart = null;
        // $message = 'Success';
            return view('user.message', ['message' => 'Purcahse done!']);
        }
        catch(Exception $e){
            return view('user.message', ['message' => $e]);
        }

    }
}
