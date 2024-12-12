@extends('layouts.main')

@section('header')
    Riwayat Transaksi
@endsection

@section('title')
    <p class="text-primary" style="font-size: 1.9rem; font-weight: 700;">Filter Transaksi<p>
@endsection

@section('body')
<div class="container-fluid">
    <div class="card mx-3">
          
          
        <div class="card-body">

            <form action="/riwayat-parkir/filter" method="post">
                @csrf

                @can('admin')
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="id_user">Nama Karyawan</label>
                            <select class="custom-select" name="id_user" >
                                <option value="" selected disabled>-- Semua --</option>
                                @foreach ($user as $user)
                                    <option value="{{ $user->id }}">{{ $user->nama }}</option>
                                @endforeach
                            </select>
                            @error('id_user')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                @endcan
                <div class="row">  
                    <div class="form-group col-4">
                        <label for="id_tarif">Jenis Kendaraan</label>
                        <select class="custom-select" name="id_tarif">
                            <option value="" selected disabled>-- Semua --</option>
                            @foreach ($tarif as $tarif)
                                <option value="{{ $tarif->id }}">{{ ucfirst($tarif->jenis_kendaraan) }}</option>
                            @endforeach
                        </select>
                        @error('id_tarif')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                  <div class="form-group col-4">
                        <label for="start">Waktu Awal</label>
                        <input type="date" class="form-control @error('start') is-invalid @enderror" name="start" value="{{ old('start') }}">
                        @error('start')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-4">
                        <label for="end">Waktu Akhir</label>
                        <input type="date" class="form-control @error('end') is-invalid @enderror"name="end" value="{{ old('end') }}">
                        @error('end')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                  </div>
                  <div class="row">
                    <div class="col-1 mt-2">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    
            
                  </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

@endsection
