<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Image;
use App\Category;

class ProductsController extends Controller
{

    public function index($category_id=false)
    {
        $categories = \App\Category::all();
        $query = Product::visibles();
        if($category_id){
          $query->where('category_id',$category_id);
        }
        $products = $query->get();
        return view('products.index', compact('products', 'categories'));
    }


    public function create()
    {
        $categories = \App\Category::all();
        return view('products.form', compact('categories'));
    }


    public function store(Request $request)
    {
        $product = \Auth::user()->products()->create($request->all());
        return redirect('products');
    }


    // public function show(Product $product, Image $images)
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = \App\Category::all();
        return view('products.form-edit', compact('categories', 'product'));
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return redirect('products');
    }

    public function destroy(Product $product)
    {
        foreach ($product->images as $image) {
          //borrar los archivo imagen
          \Storage::delete($image->src);
          //borrar las filas imagen
          $image->delete();
        }
        //pasar el product a inactivo
        $product->visible = 0;
        $product->save();

        return redirect('products');
    }

    public function images(Request $request, $id)
    {
      //guardo el archivo
      $product = Product::find($id);
      $file = $request->file('file');
      $ext = $file->extension();
      $name = uniqid();
      $file->storeAs('products-'.$product->id, $name.'.'.$ext);

      //persiste en base
      $image = new \App\Image(['src' => 'products-'.$product->id.'/'.$name.'.'.$ext]);
      $product->images()->save($image);
    }
}
