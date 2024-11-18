  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item d-none d-sm-inline-block justify-content-end">
        {{-- @can('sekretaris') --}}
        <a href="/logout" onclick="return confirm('Yakin ingin logout?')" class="nav-link">Logout</a>
        {{-- @endcan --}}
      </li>
    </ul>
  </nav>

  <!-- /.navbar -->

