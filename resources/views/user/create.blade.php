@extends('layouts.main')

@section('header')
    Petugas
@endsection

@section('title')
  <p class="text-primary" style="font-size: 1.9rem; font-weight: 700;">Tambah Petugas<p>
@endsection

@section('body')
<div class="container-fluid">
    <div class="card mx-3">
          
          
        <div class="card-body">

            <form action="/user" method="post">
                @csrf
                {{-- <input type="hidden" name="id_absensi" value=""> --}}
                
                <div class="row mx-1 mt-2">            
                  <div class="form-group col-5">
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama" name="nama" value="{{ old('nama') }}" autofocus>
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-4">
                        <input type="text" class="form-control @error('nohp') is-invalid @enderror" placeholder="Nomor HP" name="nohp" value="{{ old('nohp') }}">
                        @error('nohp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-3">
                        <select class="custom-select" name="level">
                            @if (old('level') == 1)
                                <option value="0">Petugas</option>
                                <option value="1" selected>Admin</option>
                            @else
                                <option value="0" >Petugas</option>
                                <option value="1">Admin</option>
                            @endif
                        </select>
                    </div>

                  </div>
                  <div class="row mx-1 mb-1">
                    <div class="form-group col-12">
                        <input type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Username" name="username" value="{{ old('username') }}" autofocus>
                        @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-12">
                        <input type="text" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-1 mt-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    
            
                  </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

@endsection
