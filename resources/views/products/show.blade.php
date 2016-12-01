@extends('layouts.app')

@section('titulo')
  {{$product->name}}
@endsection

@section('contenido')
  <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <div class="row">
          <div class="col-lg-12">
              <h1 class="page-header">{{$product->name}}
              </h1>
              <ol class="breadcrumb">
                  <li><a href="/">Home</a>
                  </li>
                  <li><a href="/categories/{{$product->category->id}}">{{$product->category->value}}</a></li>
                  <li class="active">{{$product->name}}</li>
              </ol>
          </div>
      </div>
      <!-- /.row -->

      <!-- Portfolio Item Row -->
      <div class="row">

          <div class="col-md-8">
              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->

                  <div class="carousel-inner">

                      @forelse($product->images as $image)

                        <div class="item">
                          <img class="img-responsive"  src="/img/{{$image->src}}" style="height:100%; margin:0 auto;" alt="">
                        </div>
                      @empty
                      <div class="item active">
                        <img class="img-responsive" src="/img/nhic.png" style="width:100%;" alt="">
                      </div>
                      @endforelse
                  </div>
                  <script>
                  $( document ).ready(function() {
                    $(".carousel-inner div").first().addClass("item active");
                  });
                  </script>

                  <!-- Controls -->
                  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                      <span class="glyphicon glyphicon-chevron-left"></span>
                  </a>
                  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                      <span class="glyphicon glyphicon-chevron-right"></span>
                  </a>
              </div>
          </div>

          <div class="col-md-4">
              <h3>{{$product->name}}</h3>
              <p>{{$product->description}}</p>
              <h2>${{$product->price}}</h2>
          </div>

      </div>
      <!-- /.row -->
</div>
<div class="row">
  <br><br>
</div>
@if (Auth::id()==$product->user_id)
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <form action="/products/{{$product->slug}}/images" class="dropzone" method="post">
        {{ csrf_field() }}
        <div class="fallback">
          <input name="file" type="file" multiple />
        </div>
      </form>
    </div>
  </div>
  <div class="row">
    <br>
  </div>
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <a class="btn btn-lg btn-default btn-block" href="/products/{{$product->slug}}/edit">Editar/eliminar producto</a>
    </div>
  </div>
@endif





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
