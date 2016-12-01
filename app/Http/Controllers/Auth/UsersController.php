<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Image;

class UsersController extends Controller
{


    public function store(Request $request)
    {
        $product = \Auth::user()->products()->create($request->all());
        // $product->materials()->sync($request->input('materials'));
        return redirect('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    // public function show()
    {
        $categories = \App\Category::all();
        $products = \App\Product::visibles()->get();
        // return view('products.show', compact('product'));
        return view('profile', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user = \App\Category::all();
        return view('users.form-edit', compact('categories', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $product->update($request->all());
        // $product->materials()->sync($request->input('materials'));
        return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        foreach ($user->avatars as $avatar) {
          //borrar los archivo imagen
          \Storage::delete($avatar->src);
          //borrar las filas imagen
          $avatar->delete();
        }
        //pasar el product a inactivo

        return redirect('/');
    }

    public function avatars(Request $request, $id)
    {
      //guardo el archivo
      $product = Product::find($id);
      $file = $request->file('file');
      $ext = $file->extension();
      $name = uniqid();
      $file->storeAs('products-'.$user->id, $name.'.'.$ext);

      //persiste en base
      $image = new \App\Image(['src' => 'user-'.$user->id.'/'.$name.'.'.$ext]);
      $user->avatars()->save($image);
    }
}
