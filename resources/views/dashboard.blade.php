@extends('layouts.main')

@section('header')
    Dashboard
@endsection
@section('title')
  <p class="text-primary" style="font-size: 1.9rem; font-weight: 700;">Selamat Datang, {{ auth()->user()->nama }}<p>
@endsection

@section('body')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-sm-8 col-md-4">
            <div class="info-box">
              <span class="info-box-icon"><img src="{{ asset('images/dashboard/kendaraan.svg') }}" class="nav-icon" alt="Dashboard" style="width: 100%; height: 100%;"></span>
              <div class="info-box-content">
                  <span class="info-box-number text-primary" style="font-size: 1.2rem">
                    {{ $masuk }} 
                  </span>
                  <span class="info-box-text text-muted">Kendaraan Masuk</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-12 col-sm-8 col-md-4">
              <div class="info-box mb-3">
              <span class="info-box-icon"><img src="{{ asset('images/dashboard/kendaraan.svg') }}" class="nav-icon" alt="Dashboard" style="width: 100%; height: 100%;"></span>
                
                <div class="info-box-content">
                  <span class="info-box-number text-primary" style="font-size: 1.2rem">
                    10
                  </span>
                  <span class="info-box-text text-muted">Lahan Parkir Tersedia</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <!-- /.col -->
  
            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>
            <!-- /.col -->
            <div class="col-12 col-sm-8 col-md-4">
              <div class="info-box mb-3">
                <span class="info-box-icon"><img src="{{ asset('images/dashboard/check.svg') }}" class="nav-icon" alt="Dashboard" style="width: 100%; height: 100%;"></span>
  
                <div class="info-box-content">
                  <span class="info-box-number text-primary" style="font-size: 1.2rem">
                    {{ $keluar }}
                  </span>
                  <span class="info-box-text text-muted">Kendaraan Keluar</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>

            @can('admin')
            <div class="col-12 col-sm-8 col-md-4">
              <div class="info-box mb-3">
                <span class="info-box-icon"><img src="{{ asset('images/dashboard/petugas.svg') }}" class="nav-icon" alt="Dashboard" style="width: 100%; height: 100%;"></span>
                
                <div class="info-box-content">
                  <span class="info-box-number text-primary" style="font-size: 1.2rem">
                    {{ $petugas }}
                  </span>
                  <span class="info-box-text text-muted">Jumlah Petugas</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>

            <div class="col-12 col-sm-8 col-md-4">
              <div class="info-box mb-3">
              <span class="info-box-icon"><img src="{{ asset('images/dashboard/pemasukanHari.svg') }}" class="nav-icon" alt="Dashboard" style="width: 100%; height: 100%;"></span>
                
                <div class="info-box-content">
                  <span class="info-box-number text-primary" style="font-size: 1.2rem">
                    Rp {{ $perhari }}
                  </span>
                  <span class="info-box-text text-muted">Pemasukan Perhari</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            
            <div class="col-12 col-sm-8 col-md-4">
              <div class="info-box mb-3">
              <span class="info-box-icon"><img src="{{ asset('images/dashboard/pemasukanBulan.svg') }}" class="nav-icon" alt="Dashboard" style="width: 100%; height: 100%;"></span>
                
                <div class="info-box-content">
                  <span class="info-box-number text-primary" style="font-size: 1.2rem">
                    Rp {{ $perbulan }}
                  </span>
                  <span class="info-box-text text-muted">Pemasukan Perbulan</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            @endcan
  
            <!-- /.col -->
          </div>
  
          @can('admin')
          <div class="card card-dark">
            <div class="card-header">
              <h3 class="card-title">Jumlah Kendaraan Pertahun {{ now()->year }}</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="chart">
                <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <div class="card card-dark">
            <div class="card-header">
              <h3 class="card-title">Jumlah Pendapatan Pertahun {{ now()->year }}</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="chart">
                <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          
          @endcan


        <!-- Small boxes (Stat box) -->
      </div> <!-- /.row -->      
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

 @endsection

 @push('js')
     <script>

var areaChartData = {
      labels  : {!! json_encode($bulan)  !!},
      datasets: [
        {
          label               : 'Pemasukan Pertahun',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : {!! json_encode($hitung_pertahun)  !!}
        },
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : true,
          }
        }],
        yAxes: [{
          gridLines : {
            display : true,
          }
        }]
      }
    }

    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    var lineChartOptions = $.extend(true, {}, areaChartOptions)
    var lineChartData = $.extend(true, {}, areaChartData)
    lineChartData.datasets[0].fill = false;
    lineChartOptions.datasetFill = false

    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: lineChartData,
      options: lineChartOptions,

    })

var barChartData = {
      labels  : {!! json_encode($bulan)  !!},
      datasets: [
        {
          label               : 'Mobil',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : {!! json_encode($hitung_mobil)  !!}
        },
        {
          label               : 'Motor',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : {!! json_encode($hitung_motor)  !!}
        },
      ]
    }

    var barChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: true
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = $.extend(true, {}, barChartData)

    var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    new Chart(stackedBarChartCanvas, {
      type: 'bar',
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })
    // })
    
     </script>
 @endpush
