<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;

class PageController extends Controller
{
    public function faq(){
      return view('cart');
    }


    public function profile()
    {
      $products = Product::visibles()->get();
      $theuser = \Auth::user();
      return view('profile', compact('products','theuser'));
    }

    public function update(Request $request, User $user)
    {
      //PARA EL USUARIO
      // dd($request);
      $user = \Auth::user()->update($request->all());
      // $user->update($request->all());
      return redirect('/profile');
    }

    public function avatar(Request $request)
    {
      //guardo el archivo
      $user = \Auth::user();
      $file = $request->file('file');
      $ext = $file->extension();
      $name = uniqid();
      $file->storeAs('avatar-'.$user->id, $name.'.'.$ext);

      //persiste en base
      $user = User::find(\Auth::id());
      $avatar = 'avatar-'.$user->id.'/'.$name.'.'.$ext;
      $user->src = "img/".$avatar;
      $user->save();
    }



}
