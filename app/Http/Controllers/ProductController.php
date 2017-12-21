<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Session;
use App\Cart;

class ProductController extends Controller
{
    public function index(){
        $product = Product::all();
        return view('shop.index', ['products' => $product]);
    }

    public function getDetail($id){
        $product = Product::find($id);
        return view('shop.detail', ['product' => $product]);
    }

    public function back(){
        return redirect()->back();
    }

    public function getAddToCart(Request $request, $id){
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->product_id);

        $request->session()->put('cart', $cart);
        return redirect()->route('product.index');
    }

    public function getReduceByOne($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduce($id);

        if(count($cart->items) >0){
            Session::put('cart', $cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->route('product.shoppingCart');
    }

    public function getRemoveItem($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if(count($cart->items) >0){
            Session::put('cart', $cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->route('product.shoppingCart');
    }

    public function getCart(){
        if(!session::has('cart')){
            return view('shop.shopping-cart', ['products' => null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shop.shopping-cart', ['products' => $cart->items,'totalPrice' => $cart->totalPrice]);
    }

    public function getCheckout(){
        if(!session::has('cart')){
            return view('user.signin');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('shop.checkout', ['total' => $total]);
    }

    public function search(Request $request){
        // print_r($request->q);
        $query = '%'.$request->q.'%';
        $products = Product::where('name', 'like', $query)
        ->orWhere('detail', 'like', $query)->get();
        return view('shop.search', ['products' => $products]);
    }
}