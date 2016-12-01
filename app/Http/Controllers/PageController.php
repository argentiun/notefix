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
      $products = Product::visibles()->get();
      return view('profile', compact('products'));
    }

    public function update(Request $request, User $user)
    {
      //PARA EL USUARIO
      // dd($request);
      $user = \Auth::user()->update($request->all());
      // $user->update($request->all());
      return redirect('/profile');

      // PARA LA IMAGEN
      //guardo el archivo
      // $id = \Auth::user()->id;
      // $usuario = User::find($id);
      // $file = $request->file('file');
      // // $ext = $file->extension();
      // $ext = pathinfo($file, PATHINFO_EXTENSION);
      // $name = uniqid();
      // $file->storeAs('avatar-'.$usuario->id, $name.'.'.$ext);
      //
      // //persiste en base
      // $image = new \App\Image(['src' => 'avatar-'.$usuario->id.'/'.$name.'.'.$ext]);
      // $usuario->src()->save($image);
    }


}
