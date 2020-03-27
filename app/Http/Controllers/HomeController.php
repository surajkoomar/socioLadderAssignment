<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Product;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // if(Auth::User()->user_type == 'admin'){
            $productList = Product::paginate(5);;
            return view('products.product_list',compact('productList'));     
        /*}else{
           return view('home'); 
        }*/
        
    }
}
