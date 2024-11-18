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
        <a href="/riwayat-parkir" class="btn-btn-flat rounded-0 btn-secondary btn-sm"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
        <hr>
        <table id="example2" class="table table-sm table-borderless">
          <tbody>
            @foreach ($history as $history)
            <tr>
              <td width="20%">Kode Parkir</td>  
              <td>:</td>  
              <td>{{ $history->kode_parkir }}</td>
            </tr>
            <tr>
                <td>Petugas</td>  
                <td>:</td>  
                <td>{{ $history->user->nama }}</td>
            </tr>
            <tr>
                <td>Kendaraan</td>  
                <td>:</td>  
                <td>{{ ucfirst( $history->tarif->jenis_kendaraan) }} </td>
            </tr>
            <tr>
                <td>No Plat</td>  
                <td>:</td>  
                <td>{{ $history->plat }} </td>
            </tr>
            <tr>
                <td>Waktu Masuk</td>  
                <td>:</td>  
                <td>{{ $history->created_at->format('d-M-Y | H:i:s') }}</td>
            </tr>
            <tr>
                <td>Waktu Keluar</td>  
                <td>:</td>  
                <td>{{ $history->updated_at->format('d-M-Y | H:i:s') }}</td>
            </tr>
            <tr>
                <td>Durasi</td>  
                <td>:</td>  
                <td>{{ $history->durasi }}</td>
            </tr>
            <tr>
                <td>Harga</td>  
                <td>:</td>  
                <td>Rp {{ number_format($history->harga, 0, '.', '.') }}</td>
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