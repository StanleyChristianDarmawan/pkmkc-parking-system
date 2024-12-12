  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link text-center">
      {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
      <span class="brand-text text-primary" style="font-size: 1.9rem;"><b>Parkir</b>.in</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-item mb-3">
            <a href="/dashboard" class="nav-link {{ Request::is('dashboard*') ? "active" : "" }}">
              <div class="d-flex align-items-center">
                <img src="{{ asset('images/icon/dashboard.png') }}" class="nav-icon" alt="Dashboard" style="width: 20px; height: 20px;">
                <p class="mb-0 ml-2">Dashboard</p>
              </div>
            </a>
          </li>
          
          @can('admin')
          <li class="nav-header mb-2 font-weight-bold" style="font-size: 1rem; color: #514E4E">PENGELOLAAN</li>
          <li class="nav-item mb-3">
            <a href="/user" class="nav-link {{ Request::is('user*') ? "active" : "" }}">
              <div class="d-flex align-items-center">
                <img src="{{ asset('images/icon/petugas.png') }}" class="nav-icon" alt="Dashboard" style="width: 20px; height: 20px;">
                <p class="mb-0 ml-2">Petugas</p>
              </div>
            </a>
          </li>
          <li class="nav-item mb-3">
            <a href="/tarif" class="nav-link {{ Request::is('tarif*') ? "active" : "" }}">
              <div class="d-flex align-items-center">
                <img src="{{ asset('images/icon/tarif.png') }}" class="nav-icon" alt="Dashboard" style="width: 20px; height: 20px;">
                <p class="mb-0 ml-2">Tarif</p>
              </div>
            </a>
          </li>
          @endcan

          <li class="nav-header mb-2 font-weight-bold" style="font-size: 1rem; color: #514E4E">TRANSAKSI</li>
          <li class="nav-item mb-3">
            <a href="/keluar-parkir" class="nav-link {{ Request::is('keluar-parkir*') ? "active" : "" }}">
              <div class="d-flex align-items-center">
                <img src="{{ asset('images/icon/keluar_parkir.png') }}" class="nav-icon" alt="Dashboard" style="width: 20px; height: 20px;">
                <p class="mb-0 ml-2">Keluar Parkir</p>
              </div>
            </a>
          </li>

          <li class="nav-header mb-2 font-weight-bold" style="font-size: 1rem; color: #514E4E">LAPORAN</li>
          <li class="nav-item mb-3">
            <a href="/riwayat-parkir" class="nav-link {{ Request::is('riwayat-*') ? "active" : "" }}">
              <div class="d-flex align-items-center">
                <img src="{{ asset('images/icon/riwayat_parkir.png') }}" class="nav-icon" alt="Dashboard" style="width: 20px; height: 20px;">
                <p class="mb-0 ml-2">Riwayat Parkir</p>
              </div>
            </a>
          </li>

          <li class="nav-item mb-3">
            <a href="/logout" onclick="return confirm('Yakin ingin logout?')" class="nav-link">
              <div class="d-flex align-items-center">
                <img src="{{ asset('images/icon/logout.png') }}" class="nav-icon" alt="Dashboard" style="width: 20px; height: 20px;">
                <p class="mb-0 ml-2">Logout</p>
              </div>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>

    <!-- /.sidebar -->

  </aside>
