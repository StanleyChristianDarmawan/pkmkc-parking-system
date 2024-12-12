<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Parkir Online</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">
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
<a href="/index2.html"><b>Parkir</b>.in</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body rounded border">
      <h5 class="text-center mb-3">Pilih Jenis Kendaraan</h5>
      <hr>
      <div class="social-auth-links text-center my-5">
        @foreach ($tarif as $tarif)
        <a href="/masuk/{{ $tarif->jenis_kendaraan }}" class="btn btn-lg btn-block btn-primary mb-4">
           {{ strtoupper($tarif->jenis_kendaraan) }}
        </a>
        @endforeach
      </div>
      <!-- /.social-auth-links -->
    </div>
    <!-- /.log\in-card-body -->
  </div>
</div>
<img src="{{ asset('images/login/bg2.svg') }}" class="nav-icon bottom-image">
<!-- /.login-box -->

<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>
</body>
</html>
