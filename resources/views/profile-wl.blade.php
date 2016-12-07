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
        <div class="col-md-6 ">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-10 col-md-offset-1 ">
                      <br>
                      <img class="img-rounded" src="/{{\Auth::user()->src}}" style="height:256px; display:block; margin: 0 auto;" alt="">
                      <hr>
                      <p class="lead">Info Personal</p>
    											{{ csrf_field() }}
    											{{method_field('patch')}}
    											<strong>Nombre:</strong><p>{{Auth::user()->name}}</p>
    											<strong>Apellido:</strong><p>{{Auth::user()->lastname}}</p>
                          <strong>Teléfono:</strong><p>{{Auth::user()->tel}}</p>
    											<strong>Email:</strong><p>{{Auth::user()->email}}</p>
                          <hr>
                          <a href="/profile/edit"><input type="submit" name="Enviar"  value="Editar datos" class="btn btn-default"></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-body">
              <h3>  Mis productos</h3>
            </div>
            @foreach ($products as $product)
              @if(Auth::id()==$product->user_id)
              <hr>
              <div class="panel-body">
              <div class="row">
                <div class="col-md-12">
                  <a href="/products/{{$product->slug}}"><h4>{{$product->name}}</h4></a>
                  @forelse($product->images as $image)
                  @if ($loop->first)
                  <div class="col-md-6">
                    <img  class="img-responsive img-hover img-thumbnail" src="/img/{{$image->src}}"style="height:150px; display:block; margin:auto;">
                  </div>
                  @endif
                  @empty
                  <div class="col-md-6">
                    <img class="img-responsive img-hover img-thumbnail" src="/img/nhic.png" style="height:150px; display:block; margin:auto;">
                  </div>
                  @endforelse
                  <!-- <div class="row"> -->
                  <div class="col-md-6">
                    <div class="row">
                      <br>
                      <!--<a class="btn btn-default" href="/products/{{$product->id}}/edit">Editar</a>-->
                      <a href="/products/{{$product->slug}}/edit"><input type="submit" name="Enviar"  value="Editar" class="btn btn-default"></a>
                    </div>
                    <div class="row">
                      <br>
                      <form action="/products/{{$product->slug}}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <input type="submit" name="Enviar"  value="Eliminar" class="btn btn-danger">
                      </form>
                    </div>
                  </div>
                </div>
                <!-- </div> -->
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
              <div >
                  <p>Copyright &copy; NoteFix 2016</p>
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
