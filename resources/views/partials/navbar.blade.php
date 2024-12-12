  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
    <li class="nav-item d-flex align-items-center">
      <img src="{{ asset('images/photo_profile.png') }}" class="card-img-top img-cover" alt="Photo Profile" style="width: 50px; height: 50px; border-radius: 50%;">
      <div class="ml-3 mr-5">
        <div class="font-weight-bold" style="font-size: 1.1rem;">{{ auth()->user()->nama }}</div>
        <div class="text-primary" style="font-size: 0.85rem; font-weight: 700;">
          @if(auth()->user()->level == 1)
            Admin
          @elseif(auth()->user()->level == 0)
            Petugas
          @else
            Unknown
          @endif
        </div>
      </div>
    </li>
  </ul>

  </nav>

  <!-- /.navbar -->

