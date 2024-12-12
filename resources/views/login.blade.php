<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Parkir Online | Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <style>
    .bottom-image {
      position: fixed;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      z-index: -1;
      width: 50%;
      max-width: 400px;
      height: auto;
    }

    .top-right-image {
      position: fixed;
      top: 0;
      right: 0;
      z-index: -1;
      width: 50%;
      max-width: 180px;
      height: auto;
    }

    @media (max-width: 576px) {
      .bottom-image {
        width: 80%;
      }
      .top-right-image {
        width: 60%;
      }
    }
  </style>


</head>
<body class="hold-transition login-page" style="background-color: white">
<img src="{{ asset('images/login/bg1.svg') }}" class="nav-icon top-right-image">
<div class="login-box">
  <div class="login-logo">
    <a href="/"><b>Sign </b>In</a>
  </div>
  @if(session()->has('loginError'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('loginError') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body rounded border">
      {{-- <p class="text-center">-  -</p> --}}
      <form action="/login" method="post">
        @csrf
        <div class="input-group my-3">
          <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Username" value="{{ old('username') }}" autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          @error('username')
              <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @error('password')
             <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12 mt-3 text-center">
            <button type="submit" class="btn btn-white border px-4">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<img src="{{ asset('images/login/bg2.svg') }}" class="nav-icon bottom-image">
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
