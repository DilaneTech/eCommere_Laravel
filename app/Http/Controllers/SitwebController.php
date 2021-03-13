<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class SitwebController extends Controller
{
    public function index(){
        return view('sitweb.index');
    }

    public function about(){
        return view('sitweb.about');
    }

    public function contact(){
        return view('sitweb.contact');
    }

    public function emptyCart(){
        Cart::destroy();
        return redirect(route('products.index'));
    }
}
