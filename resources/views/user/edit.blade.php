@extends('layouts.main')

@section('header')
    Petugas
@endsection

@section('title')
  Ubah Data Petugas
@endsection

@section('body')

<div class="container-fluid">
    <div class="card mx-3">
          
          
        <div class="card-body">

            <form action="/user/{{ $user->id }}" method="post">
                @csrf
                @method('put')                
                
                <div class="row mx-1 mt-2">            
                  <div class="form-group col-5">
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama" name="nama" value="{{ old('nama', $user->nama) }}" autofocus>
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-4">
                        <input type="text" class="form-control @error('nohp') is-invalid @enderror" placeholder="Nomor HP" name="nohp" value="{{ old('nohp', $user->nohp) }}">
                        @error('nohp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-3">
                        <select class="custom-select" name="level">
                            @if (old('level', $user->level) == 1)
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
                        <input type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Username" name="username" value="{{ old('username', $user->username) }}" autofocus>
                        @error('username')
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
