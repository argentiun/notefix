<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Image;
use App\Category;

class CategoriesController extends Controller
{

    public function index()
    {
      $categories = \App\Category::where('id', $id)->get();
      $products = Product::visibles()->get();
      return view('products.showcat', compact('categories','products'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id){

         $categories = \App\Category::where('id', $id)->get();
         $products = Product::where("category_id", $id)
                            ->where("visible","=",1)->get();
        return view('products.showcat', compact('categories','products'));
    }

    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
