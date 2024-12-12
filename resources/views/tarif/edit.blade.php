@extends('layouts.main')

@section('header')
    Tarif
@endsection

@section('title')
  <p class="text-primary" style="font-size: 1.9rem; font-weight: 700;">Ubah Tarif Kendaraan<p>
@endsection

@section('body')
<div class="container-fluid">
    <div class="card mx-2">
        <div class="card-body">
            <form action="/tarif/{{ $tarif->id }}" method="post">
                @csrf
                @method('put')
                <div class="row mb-3 mt-1">
                  <div class="col-3">
                    <label for="jenis_kendaraan">Kendaraan</label>
                    <input type="text" name="jenis_kendaraan" class="form-control @error('jenis_kendaraan') is-invalid @enderror" placeholder="Kendaraan" value="{{ ucfirst(old('jenis_kendaraan', $tarif->jenis_kendaraan))  }}" autofocus>
                    @error('jenis_kendaraan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-3">
                    <label for="tarif">Tarif / jam</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Rp</span>
                      </div>
                      <input type="text" class="form-control @error('tarif') is-invalid @enderror" placeholder="Tarif  /  jam" value="{{ old('tarif', $tarif->tarif) }}" name="tarif">
                      @error('tarif')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-3">
                    <label for="waktu_maks">Waktu Maks / jam</label>
                    <input type="text" name="waktu_maks" class="form-control @error('waktu_maks') is-invalid @enderror" placeholder="Waktu Maks / jam" value="{{ old('waktu_maks', $tarif->waktu_maks) }}" autofocus>
                    @error('waktu_maks')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-3">
                    <label for="Tarif Maks">Tarif Maks</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Rp</span>
                      </div>
                      <input type="text" class="form-control @error('tarif_maks') is-invalid @enderror" placeholder="Tarif Maks" value="{{ old('tarif_maks', $tarif->tarif_maks) }}" name="tarif_maks">

                      @error('tarif_maks')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    
                  </div>
                </div>
                                  
                  <button type="submit" class="btn btn-sm btn-primary mt-2">Simpan</button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

@endsection
