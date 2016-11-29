@extends('layouts.app')

@section('contenido')
@if (Auth::id()!=$product->user_id)
<?php return Redirect::to('/');  ?>
@endif
  <div class="container">
    <div class="row">
      <br><br>
    </div>
    <div class="col-md-8 col-md-offset-2">
      <form action="/products/{{$product->id}}" method="post" class="form-horizontal">
        {{ csrf_field() }}
        {{ method_field('patch') }}

        <div class="form-group">
          <label for="name">Nombre</label>
          <input type="text" name="name" value="{{ $product->name }}" class="form-control">
        </div>

        <div class="form-group">
          <label for="price">Precio</label>
          <input type="text" name="price" value="{{ $product->price }}" class="form-control">
        </div>

        <div class="form-group">
          <label for="description">Descripción</label>
          <textarea name="description" rows="10" class="form-control">{{ $product->description }}</textarea>
        </div>

        <div class="form-group">
          <label for="name">Categoría</label>
          <select name="category_id" class="form-control">
            @foreach($categories as $category)
              @php $selected = ($category->id == $product->category_id)?'selected':'' @endphp
              <option value="{{ $category->id }}" {{$selected}}>{{ $category->value }}</option>
            @endforeach
          </select>
        </div>


            <div class="form-group">
              <input type="submit" name="Enviar" class="btn btn-primary">
            </div>
          </form>
          <form action="/products/{{$product->id}}" method="post" class="form-horizontal">
            {{ csrf_field() }}
            {{ method_field('delete') }}
            <div class="form-group">
                <input type="submit" name="Enviar"  value="Eliminar producto"  class="btn btn-danger">
            </div>
          </form>
        </div>

    </div>


  </div>

@endsection
