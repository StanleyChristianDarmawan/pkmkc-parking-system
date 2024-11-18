@extends('layouts.main')

@section('header')
    Tarif
@endsection

@section('title')
  Tarif Kendaraan
@endsection

@section('body')
<div class="container-fluid">
    {{-- input form --}}
    <form action="/tarif" method="post">
      @csrf
      <div class="row mb-3" style="margin-left: 1px">

        <div class="col-2">
          <input type="text" name="jenis_kendaraan" class="form-control @error('jenis_kendaraan') is-invalid @enderror" placeholder="Kendaraan" value="{{ old('jenis_kendaraan') }}" autofocus>
          @error('jenis_kendaraan')
              <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="col-3">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">Rp</span>
            </div>
            <input type="text" class="form-control @error('tarif') is-invalid @enderror" placeholder="Tarif  /  jam" value="{{ old('tarif') }}" name="tarif">
            @error('tarif')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="col-3">
          <input type="text" name="waktu_maks" class="form-control @error('waktu_maks') is-invalid @enderror" placeholder="Waktu Maks / jam" value="{{ old('waktu_maks') }}" autofocus>
          @error('waktu_maks')
              <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="col-3">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">Rp</span>
            </div>
            <input type="text" class="form-control @error('tarif_maks') is-invalid @enderror" placeholder="Tarif Maks" value="{{ old('tarif_maks') }}" name="tarif_maks">
            <span class="input-group-append">
              <button type="submit" class="btn btn-secondary btn-flat"><i class="fa fa-plus"></i></button>
            </span>
            @error('tarif_maks')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          
        </div>
      </div>

        </div>
    </form>

    {{-- datatables --}}
    <div class="row">
    <div class="col-12">
        <div class="card mx-2 ">
        <div class="card-body">
          <table class="table table-sm table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Jenis Kendaraan</th>
                <th>Tarif / jam</th>
                <th>Waktu Maks / jam</th>
                <th>Tarif Maks</th>
                <th>Aksi</th>
          </tr>
            </thead>
            <tbody>
              @foreach ($tarif as $tarif)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ ucfirst( $tarif->jenis_kendaraan) }}</td>
                <td>Rp {{ number_format( $tarif->tarif , 0, ".", ".") }}</td>
                <td>
                  @if ($tarif->waktu_maks == null)
                      -
                  @else
                     {{ $tarif->waktu_maks}} Jam
                  @endif
                </td>
                <td>
                  @if ($tarif->tarif_maks == null)
                      -
                  @else
                     Rp {{ number_format( $tarif->tarif_maks, 0, '.', '.')}}
                  @endif
                </td>
                <td>
                    <div class="btn-group">
                      <a href="/tarif/{{ $tarif->id }}/edit" class="btn btn-warning btn-xs rounded-0">Ubah</a>
                      <a href=" /tarif/{{ $tarif->id  }}/hapus" onclick="confirm('Yakin ingin menghapus?')" class="btn rounded-0 btn-danger btn-xs">Hapus</a>
                    </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
            </div>
        <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->

@endsection

@push('js')
    <script>
      function number(tarif) {

      tarif = 
      return celcius;

      }
    </script>
@endpush
