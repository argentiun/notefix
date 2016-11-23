@extends('layouts.app')

@section('titulo')
  {{$product->name}}
@endsection

@section('contenido')
  <!-- Page Content -->
  <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <div class="row">
          <div class="col-lg-12">
              <h1 class="page-header">Portfolio Item
                  <small>Subheading</small>
              </h1>
              <ol class="breadcrumb">
                  <li><a href="index.html">Home</a>
                  </li>
                  <li class="active">Portfolio Item</li>
              </ol>
          </div>
      </div>
      <!-- /.row -->

      <!-- Portfolio Item Row -->
      <div class="row">

          <div class="col-md-8">
              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                      <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                      <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                      <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                  </ol>

                  <!-- Wrapper for slides -->
                  <div class="carousel-inner">
                    {{-- @foreach ($array as $element)

                    @endforeach --}}
                    @forelse($product->images as $image)
                      <div class="col-md-6">
                        {{-- <img  src="/content/{{ $image->src }}" class="img-responsive" /> --}}
                        {{-- <img  src="@php echo asset('storage')@endphp/{{ $image->src }}" class="img-responsive" /> --}}
                        <img  src="/img/{{$image->src}}" class="img‐responsive" />
                      </div>
                    @empty
                      <h3>
                        No hay imágenes cargadas.
                      </h3>
                    @endforelse
                      {{-- <div class="item active">
                          <img class="img-responsive" src="/content/" alt="{{ $product->name }}" class="img-responsive" />
                      </div> --}}
                  </div>

                  <!-- Controls -->
                  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                      <span class="glyphicon glyphicon-chevron-left"></span>
                  </a>
                  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                      <span class="glyphicon gl




Copyright © Your Website 2014
yphicon-chevron-right"></span>
                  </a>
              </div>
          </div>

          <div class="col-md-4">
              <h3>Description</h3>
              <p>{{$product->description}}</p>
              <h3>${{$product->price}}</h3>
              {{-- <ul>
                  <li>Lorem Ipsum</li>
                  <li>Dolor Sit Amet</li>
                  <li>Consectetur</li>
                  <li>Adipiscing Elit</li>
              </ul> --}}
          </div>

      </div>
      <!-- /.row -->

    </div>
    <div class="row">
      <div class="col-md-12">
        <form action="/products/{{$product->id}}/images" class="dropzone" method="post">
          {{ csrf_field() }}
          <div class="fallback">
            <input name="file" type="file" multiple />
          </div>
        </form>
      </div>
    </div>


      <hr>





      <!-- Footer -->
      <footer>
          <div class="row">
              <div class="col-lg-12">
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
