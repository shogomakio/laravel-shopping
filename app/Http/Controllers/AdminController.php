<?php

namespace App\Http\Controllers;

use Closure;
use Illuminate\Support\Facades\Auth;
use Log;
use Illuminate\Http\Request;

use App\Product;
use App\Genre;
use App\Brand;
use Session;

class AdminController extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth:admin');
    // }

    public function getSignin(){
        return view('admin.index');
    }

    public function postSignin(Request $request){
        $this->validate($request, [
            'password' => 'required|min:4'
        ]);
        if(Auth::guard('admin')->attempt(['email' => $request->email,
            'password' => $request->password])){
                return redirect()->route('admin.register');
        }
        // else
        // {
        //     throw new exception('User not found');
        // }
        return redirect()->back()->withErrors(['Warning:', 'The Email address and/or the password was incorrect.']);
    }
    
        public function getLogout(){
            if(Auth::guard('admin')->check()){
                Auth::guard('admin')->logout();
            }            
            return redirect()->route('product.index');
        }

        public function getRegister(){
            $genres = Genre::all();
            $brands = Brand::all();
            return view('admin.register', compact('genres', 'brands'));
        }

        public function postRegister(Request $request){
            $this->validate($request, [
                'product_id' => 'required|unique:products',
                'name' => 'required',
                'detail' => 'required',
                'price' => 'required|integer',
                'status' => 'required',
                'image_path' => 'required',
                'genre_id' => 'required|integer',
                'brand_id' => 'required|integer'
            ]);

            $product = new Product;
            $product->product_id = $request->product_id;
            $product->name = $request->name;
            $product->detail = $request->detail;
            $product->price = $request->price;
            $product->status = $request->status;
            $product->image_path = $request->image_path;
            // $product->genre_id = $request->genre_id;
            // $product->brand_id = $request->brand_id;
            $product->status = '1';
            $product->genre_id = $request->genre;
            $product->brand_id = $request->brand;
            try{
                $product->save();
                Session::flash('flash_message', 'Task successfully added!');
                return Redirect()->back();
            }
            catch(Exception $e){

            }
            return view('admin.list');
        }

        public function getList(){
            $products = Product::all();
            return view('admin.list', compact('products'));
        }

        public function getUpdate($product_id){
            $genres = Genre::all();
            $brands = Brand::all();
            $product = Product::find($product_id);
            // print_r($_get['product_id']);
            // print_r($product);
            return view('admin.update', ['product' => $product, 'genres' => $genres, 'brands' => $brands]);
        }

        public function postUpdate(Request $request){
            $this->validate($request, [
                'name' => 'required',
                'detail' => 'required',
                'price' => 'required|integer',
                'status' => 'required',
                'image_path' => 'required'
            ]);

            $product = Product::find($request->product_id);
            $product->fill($request->all());
            $product->status = $request->status;
            $product->genre_id = $request->genre;
            $product->brand_id = $request->brand;

            try{
                $product->save();
                Session::flash('flash_message', 'Task successfully added!');
                // return view('admin.list')->with('products', Product::all());
                return Redirect('admin/list');
            }
            catch(Exception $e){

            }
            // return view('admin.list');
            
            // return view('admin.update', compact('product'));
        }

        public function getDelete($product_id){
            $product = Product::find($product_id);
            return view('admin.delete', ['product' => $product]);
        }

        public function postDelete(Request $request){
            // $this->validate($request, [
            //     'product_id' => 'required|unique:products',
            //     'name' => 'required',
            //     'detail' => 'required',
            //     'price' => 'required|integer',
            //     'status' => 'required',
            //     'image_path' => 'required'
            // ]);

            $product = new Product;
            $product = Product::find($request->product_id);
            // $product->fill($request->all());
            $product->status = 2;
            try{
                $product->update();
                $product->delete();
            }
            catch(Exception $e){

            }
            return Redirect('admin/list');
        }

}