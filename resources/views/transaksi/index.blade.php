@extends('layouts.main')

@section('header')
    Transaksi Keluar
@endsection

@section('title')
    Transaksi Keluar
@endsection

@section('body')

<div class="container-fluid">

  <form action="/keluar-parkir" method="post">
    @csrf
    <div class="row mb-3" style="margin-left: 1px">

      <div class="col-6 ml-1">
          <div class="input-group">
            <input type="text" class="form-control" name="kode_parkir" placeholder="Kode Parkir" autofocus>
            <span class="input-group-append">
              <button type="submit" name="submit" class="btn btn-info btn-flat"><i class="fas fa-plus"></i></button>
            </span>
          </div>
        </div>
      </div>

    </div>
</form>


  <div class="card mx-3">



    <!-- /.card-header -->
    <div class="card-body p-3">
        {{-- <a href="/keluar-parkir/create" class="btn btn-primary btn-sm mb-3">Tambah <i class="fas fa-plus"></i></a> --}}
        <table  id="example2" class="table table-sm table-striped ">
          <thead>
            <tr>
              <th>No</th>
              <th>Kode Parkir</th>
              <th>Jenis Kendaraan</th>
              <th>Tanggal Masuk</th>
              <th>Jam Masuk</th>
              <th>Aksi</th>
        </tr>
          </thead>
          <tbody>
            @foreach ($parkir as $parkir)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $parkir->kode_parkir }}</td>
              <td>{{ ucfirst( $parkir->tarif->jenis_kendaraan) }}</td>
              <td>{{ $parkir->created_at->format('d-M-Y') }}</td>
              <td>{{ $parkir->created_at->format('H:i:s') }}</td>
              <td>
                  <div class="btn-group">
                    <a href="/keluar-parkir/{{ $parkir->kode_parkir }}" class="btn btn-info btn-xs rounded-0">Proses</a>
                    @can('admin')
                    <a href="/keluar-parkir/{{ $parkir->kode_parkir }}/hapus" onclick="confirm('Yakin ingin menghapus?')" class="btn rounded-0 btn-danger btn-xs">Hapus</a>
                    @endcan
                  </div>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>

    <!-- /.col -->
  </div>
    <!-- /.row -->

</div> <!-- /.container-fluid -->

@endsection

@push('js')
<script>
  $(function () {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "order" : [[3, 'desc']],
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endpush