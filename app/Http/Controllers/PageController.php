<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;

class PageController extends Controller
{
    public function faq(){
      return view('page.faq');
    }

    public function profile()
    {
      $products = Product::visibles();
      return view('profile', compact('products'));
    }
}
