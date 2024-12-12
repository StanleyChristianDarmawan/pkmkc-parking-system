@extends('layouts.main')

@section('header')
    Keluar Parkir
@endsection

@section('title')
  <p style="font-size: 1.9rem;">Bayar : <span style="color: red"> Rp {{ number_format($harga, '0', '.', '.')  }}</span><p>
@endsection

@section('body')
<div class="container-fluid">
    <div class="card mx-3">
          
          
        <div class="card-body">
            <form action="/keluar-parkir/{{ $kode_parkir }}" method="post">
                @csrf
                <input type="hidden" name="harga" id="harga" value="{{ $harga }}">
                <input type="hidden" name="id_user" value="{{ $id_user }}">
                
                <div class="row">            
                  <div class="form-group col-4">
                        <h6>Kode Parkir</h6>
                        <input type="text" class="form-control form-control-sm @error('kode_parkir') is-invalid @enderror" placeholder="Kode Parkir" name="kode_parkir" value="{{ old('kode_parkir', $kode_parkir) }}" readonly>
                        @error('kode_parkir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                  <div class="form-group col-4">
                        <h6>No Kendaraan</h6>
                        <input type="text" class="form-control form-control-sm @error('plat') is-invalid @enderror" placeholder="No Kendaraan" name="plat" value="{{ old('plat') }}" autofocus>
                        @error('plat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- <div class="col-3">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                          </div>
                          <input type="text" class="form-control @error('tarif') is-invalid @enderror" placeholder="Total Biaya" value="{{ number_format( old('tarif', $tarif) , 0, '.', '.') }}" name="tarif" readonly>
                        </div>
                        @error('jenis_kendaraan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div> --}}

                  </div>
                  <div class="row">
                    <div class="form-group col-4">
                        <h6>Jam Masuk</h6>
                        <input type="text" class="form-control form-control-sm @error('start') is-invalid @enderror" placeholder="Jam Masuk" name="start" value="{{ old('start', $start->format('d-M-Y | H:i:s')) }}" readonly>
                        @error('start')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-4">
                        <h6>Jam Keluar</h6>
                        <input type="text" class="form-control form-control-sm @error('end') is-invalid @enderror" placeholder="Jam Keluar" value="{{ old('end', $end->format('d-M-Y | H:i:s')) }}" name="end" readonly>
                        @error('end')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-4">
                        <h6>Durasi Parkir</h6>
                        <input type="text" class="form-control form-control-sm @error('durasi') is-invalid @enderror" placeholder="Durasi Parkir" name="durasi" value="{{ old('durasi', $duration) }}" readonly>
                        @error('durasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-1 mt-2">
                        <button type="submit" class="btn btn-primary mr-1">Simpan</button>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

@endsection
