@extends('layouts.app')

@section('titulo')
  @foreach($categories as $category)
    {{$category->value}}
  @endforeach
@endsection

@section('contenido')
  <!-- Page Content -->
  <div class="container">
@foreach($categories as $category)
      <!-- Page Heading/Breadcrumbs -->
      <div class="row">
          <div class="col-lg-12">
              <h1 class="page-header">{{$category->value}}
              </h1>
              <ol class="breadcrumb">
                  <li><a href="/">Home</a>
                  </li>
                  @foreach($categories as $category)
                    <li class="active">{{$category->value}}
                    </li>
                  @endforeach
              </ol>
          </div>
      </div>
      <!-- /.row -->

      <!-- Projects Row -->
      <div class="row">
      @foreach($products as $product)
        <div class="col-md-4 img-portfolio" style="height:340px;">
            <a href="/products/{{$product->slug}}">
              @forelse($product->images as $image)
                @if ($loop->first)
                  <img class="img-responsive img-hover img-thumbnail" src="/img/{{$image->src}}"style="height:214px; display:block; margin: 0 auto;">
                @endif
              @empty
                <img class="img-responsive img-hover img-thumbnail" src="/img/nhic.png" style="height:214px; display:block; margin: 0 auto;">
              @endforelse
            </a>
            <h3>
                <a href="/products/{{$product->slug}}">{{ $product->name }}</a>
            </h3>
            <p>{{ str_limit($product->description, $limit=150, $end = '...')}}</p>
        </div>
      @endforeach
    </div>
      <!-- /.row -->

      <hr>

      <!-- Pagination -->
      <div class="row text-center">
          <div class="col-lg-12">
              <ul class="pagination">
                  <li>
                      <a href="#">&laquo;</a>
                  </li>
                  <li class="active">
                      <a href="#">1</a>
                  </li>
                  <li>
                      <a href="#">2</a>
                  </li>
                  <li>
                      <a href="#">3</a>
                  </li>
                  <li>
                      <a href="#">4</a>
                  </li>
                  <li>
                      <a href="#">5</a>
                  </li>
                  <li>
                      <a href="#">&raquo;</a>
                  </li>
              </ul>
          </div>
      </div>
      <!-- /.row -->

      <hr>

      <!-- Footer -->
      <footer>
          <div class="row">
              <div class="col-lg-12">
                  <p>Copyright &copy; Your Website 2014</p>
              </div>
          </div>
      </footer>
@endforeach
  </div>
  <!-- /.container -->

  <!-- jQuery -->
  <script src="js/jquery.js"></script>

  <!-- Bootstrap Core JavaScript -->
  {{-- <script src="js/bootstrap.min.js"></script> --}}

</body>

</html>
@endsection
