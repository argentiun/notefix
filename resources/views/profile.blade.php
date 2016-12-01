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
                  <div class="col-md-8 col-md-offset-1">
                    <img src="/img/default-profile.png" style="height:256px; display:block; margin: 0 auto;" alt="">
                    <p class="lead">Info personal</p>
                    <p><strong>Nombre:</strong> {{Auth::user()->name}}</p>
                    <p><strong>Apellido:</strong> {{Auth::user()->lastname}}</p>
                    <p><strong>Email:</strong> {{Auth::user()->email}}</p>
                    <p><strong>Teléfono:</strong> {{Auth::user()->tel}}</p>
                  </div>
                  <div class="col-md-12">
                    <form action="" class="dropzone" method="post">
                      {{ csrf_field() }}
                      <div class="fallback">
                        <input name="file" type="file"/>
                      </div>
                      <button type="submit" name="button">Listo!</button>
                    </form>
                  </div>
                </div>
            </div>
        </div>

        <div class="col-md-5">
          <h3>Mis productos</h3>
          <?php foreach ($products as $product): ?>
            <p>{{$product}}</p>
            <br>
          <?php endforeach; ?>
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
