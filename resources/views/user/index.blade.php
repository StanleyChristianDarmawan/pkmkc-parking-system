@extends('layouts.main')

@section('header')
    Petugas
@endsection

@section('title')
  Data Petugas
@endsection

@section('body')

  <div class="card mx-3">

    <!-- /.card-header -->
    <div class="card-body p-3">
      <a href="/user/create" class="btn btn-primary btn-sm mb-3">Tambah <i class="fas fa-plus"></i></a>
      <table class="table table-sm table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Username</th>
            <th>Nama</th>
            <th>No HP</th>
            <th>Level</th>
            <th>Aksi</th>
      </tr>
        </thead>
        <tbody>
          @foreach ($user as $user)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->nama }}</td>
            <td>{{ $user->nohp }}</td>
            @if ($user->level == 1)
            <td>Admin</td>
            @elseif ($user->level == 0) 
            <td>Petugas</td>
            @endif
            <td>
                <div class="btn-group">
                  <a href="/user/{{ $user->id }}/edit" class="btn btn-warning btn-xs rounded-0">Ubah</a>
                  <a href="/user/{{ $user->id }}/hapus" onclick="confirm('Yakin ingin menghapus?')" class="btn rounded-0 btn-danger btn-xs">Hapus</a>
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
