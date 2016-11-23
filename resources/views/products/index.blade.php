@extends('layouts.app')

@section('titulo')
  NOMBRE DEL LSTADO DE PRODUCTOS EJEMPLO NOTEBOOKSSS
@endsection

@section('contenido')
  <!-- Page Content -->
  <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <div class="row">
          <div class="col-lg-12">
              <h1 class="page-header">Three Column Portfolio
                  <small>Subheading</small>
              </h1>
              <ol class="breadcrumb">
                  <li><a href="index.html">Home</a>
                  </li>
                  <li class="active">Three Column Portfolio</li>
              </ol>
          </div>
      </div>
      <!-- /.row -->




      <!-- Projects Row -->
      <div class="row">
        @foreach($products as $product)
          <div class="col-md-4 img-portfolio">
              <a href="{{url('products/')}}">
                  <img class="img-responsive img-hover" src="http://placehold.it/700x400" alt="">
              </a>
              <h3>
                  <a href="products/{{$product->id}}">{{ $product->name }}</a>
              </h3>
              <p>{{ $product->description }}</p>
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

  </div>
  <!-- /.container -->

  <!-- jQuery -->
  <script src="js/jquery.js"></script>

  <!-- Bootstrap Core JavaScript -->
  {{-- <script src="js/bootstrap.min.js"></script> --}}

</body>

</html>
@endsection
