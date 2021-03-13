<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Product;
class ProductController extends Controller
{

    public function index(){
        $products = Product::inRandomOrder()->take(16)->get();
        // dd($products);
        return view('sitweb.shop')->with('products', $products);
    }

    // public function productDetail(){
    //     return view('sitweb.productdetails');
    // }

    public function showProductDetails($slug){
        $products = Product::where('slug', $slug)->firstOrFail();
        return view('sitweb.detail')->with('products', $products);
    }

    public function detail(){
        return view('sitweb.detail');
    }
}
