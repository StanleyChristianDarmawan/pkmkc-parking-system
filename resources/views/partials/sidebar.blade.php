  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link text-center">
      {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
      <span class="brand-text font-weight-light">Parkir Online</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/dashboard" class="nav-link {{ Request::is('dashboard*') ? "active" : "" }}">
              <i class="nav-icon fas fa-home"></i>
              {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
              <p>
                Dashboard
              </p>
            </a>
          </li>
          @can('admin')
              
          <li class="nav-header">PENGELOLAAN</li>
          <li class="nav-item">
            <a href="/user" class="nav-link {{ Request::is('user*') ? "active" : "" }}">
              <i class="nav-icon fas fa-user"></i>
              {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
              <p>
                Petugas
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/tarif" class="nav-link {{ Request::is('tarif*') ? "active" : "" }}">
              <i class="nav-icon fas fa-tag"></i>
              {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
              <p>
                Tarif
              </p>
            </a>
          </li>
          @endcan
          <li class="nav-header">TRANSAKSI</li>
          <li class="nav-item">
            <a href="/keluar-parkir" class="nav-link {{ Request::is('keluar-parkir*') ? "active" : "" }}">
              <i class="nav-icon far fa-arrow-alt-circle-right"></i>
              <p>
                Keluar Parkir
              </p>
            </a>
          </li>
          <li class="nav-header">LAPORAN</li>
          <li class="nav-item">
            <a href="/riwayat-parkir" class="nav-link {{ Request::is('riwayat-*') ? "active" : "" }}">
              <i class="nav-icon fas fa-history"></i>              
              <p>
                Riwayat Parkir
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->

  </aside>
