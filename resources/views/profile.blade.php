@extends('layouts.app')

@section('titulo')
  Mi perfil
@endsection

@section('contenido')
  <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <div class="row">
          <div class="col-lg-12">
              <h1 class="page-header">Mi perfil
              </h1>
          </div>
      </div>
      <!-- /.row -->

      <!-- Portfolio Item Row -->
      <div class="row">
        <div class="col-md-5 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                  <form class="" action="/register/{{\Auth::user()->id}}" method="post">
                    <div class="col-md-8 col-md-offset-1">
                      <img src="/img/default-profile.png" style="height:256px; display:block; margin: 0 auto;" alt="">
                      <p class="lead">Info Personal</p>
    											{{ csrf_field() }}
    											{{method_field('patch')}}
    											<strong>Nombre:</strong><input type="text" name="name" id="name" value="{{Auth::user()->name}}">
    											<strong>Apellido:</strong><input type="text" name="lastname" id="lastname" value="{{Auth::user()->lastname}}">
                          <strong>Teléfono:</strong><input type="text" name="tel" id="tel" value="{{Auth::user()->tel}}">
    											<strong>Email:</strong><input type="text" name="email" id="email" value="{{Auth::user()->email}}">
    										<br><br>
                    </div>
                    <div class="col-md-12">
                        {{-- <div class="fallback">
                          <input name="file" type="file"/>
                        </div> --}}
                        <button type="submit" name="button">Actualizar</button>
                    </div>
                  </form>
                </div>
                <form action="/profile/avatar" class="dropzone" method="post">
                  {{ csrf_field() }}
                  <div class="fallback">
                    <input name="file" type="file" multiple />
                  </div>
                </form>
            </div>
        </div>

        <div class="col-md-5">
          <div class="panel panel-default">
          <h3>  Mis productos</h3>
            @foreach ($products as $product)
              @if(Auth::id()==$product->user_id)
              <hr>
              <div class="panel-body">
              <h4>{{$product->name}}</h4><br>
              <div class="">
                @forelse($product->images as $image)
                  @if ($loop->first)
                    <img  class="img-responsive img-hover img-thumbnail" src="/img/{{$image->src}}"style="height:150px; display:block; margin: 0 auto;">
                  @endif
                @empty
                  <img class="img-responsive img-hover img-thumbnail" src="/img/nhic.png" style="height:150px; display:block; margin: 0 auto;">
                @endforelse
                <div class="row">
                  <div class="col-md-4 col-md-offset-2">
                    <br>
                    <!--<a class="btn btn-default" href="/products/{{$product->id}}/edit">Editar</a>-->
                    <a href="/products/{{$product->id}}/edit"><input type="submit" name="Enviar"  value="Editar" class="btn btn-default"></a>
                  </div>
                  <div class="col-md-4 com-md-offset-2">
                    <br>
                    <form action="/products/{{$product->id}}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('delete') }}
                        <input type="submit" name="Enviar"  value="Eliminar" class="btn btn-danger">
                    </form>
                  </div>
                </div>
              </div>
              </div>
              @endif
            @endforeach
          </div>
        </div>

      </div>
      <!-- /.row -->

      <!-- Footer -->
      <footer>
          <div class="row">
              <div class="col-md-8 col-md-offset-2">
                  <p>Copyright &copy; Your Website 2014</p>
              </div>
          </div>
      </footer>
  </div>
  <!-- /.container -->






</body>

</html>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
@endsection
