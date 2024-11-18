@extends('layouts.main')

@section('header')
    Riwayat Transaksi
@endsection

@section('title')
    Riwayat Transaksi
@endsection

@section('body')

<div class="container-fluid">

  <div class="card mx-2">

    <!-- /.card-header -->
    <div class="card-body p-3">
        <a href="/riwayat-parkir/filter" class="btn btn-primary btn-sm mb-3"><i class="fas fa-sort"></i> Filter</a>
        <a href="/riwayat-parkir" class="btn btn-primary btn-sm mb-3"><i class="fas fa-sync"></i> Reset</a>
        <table  id="example2" class="table table-sm table-striped">
          <thead>
            <tr>
              <th>Petugas</th>
              <th>Kode Parkir</th>
              <th>Jenis</th>
              <th>No Plat</th>
              {{-- <th>Waktu Masuk</th>
              <th>Waktu Keluar</th>
              <th>Durasi</th>
              <th>Harga</th> --}}
              <th>Aksi</th>
        </tr>
          </thead>
          <tbody>
            @foreach ($history as $history)
            <tr>
              <td>{{ $history->user->nama }}</td>
              <td>{{ $history->kode_parkir }}</td>
              <td>{{ ucfirst( $history->tarif->jenis_kendaraan) }} </td>
              <td>{{ $history->plat }} </td>
              {{-- <td>{{ $history->created_at->format('d-M-Y | H:i:s') }}</td>
              <td>{{ $history->updated_at->format('d-M-Y | H:i:s') }}</td>
              <td>{{ $history->durasi }}</td>
              <td>Rp {{ number_format($history->harga, 0, '.', '.') }}</td> --}}

              <td>
                <div class="btn-group">
                  <a href="/riwayat-detail/{{ $history->id }}" class="btn btn-info btn-xs rounded-0">Detail</a>
                </div>
              </td>
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
      "order" : [[4, 'desc']],
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endpush