@extends('layouts.app')

@section('titulo')
  Registrate
@endsection

@section('contenido')
  <div class="container">
    <div class="row">
      <br><br>
    </div>
    <form action="/products" method="post" class="form-horizontal">
      {{ csrf_field() }}
      {{ method_field('post') }}

      <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
      </div>
      {{-- <div class="form-group">
        <label for="slug">slug</label>
        <input type="text" name="slug" value="{{ old('slug') }}" class="form-control">
      </div> --}}

      <div class="form-group">
        <label for="price">Precio</label>
        <input type="text" name="price" value="{{ old('price') }}" class="form-control">
      </div>

      <div class="form-group">
        <label for="description">Descripción</label>
        <textarea name="description" rows="10" class="form-control">{{ old('description') }}</textarea>
      </div>

      <div class="form-group">
        <label for="name">Categoría</label>
        <select name="category_id" class="form-control">
          @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->value }}</option>
          @endforeach
        </select>
      </div>


      <div class="form-group">
        <input type="submit" name="Enviar" class="btn btn-primary">
      </div>

    </form>
  </div>

@endsection
