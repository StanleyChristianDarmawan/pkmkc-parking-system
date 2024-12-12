@extends('layouts.main')

@section('header')
    Petugas
@endsection

@section('title')
  <p class="text-primary" style="font-size: 1.9rem; font-weight: 700;">Data Petugas<p>
@endsection

@section('body')
  <div class="mx-3">
      <a href="/user/create" class="btn btn-primary btn-sm mb-3">Tambah <i class="fas fa-plus"></i></a>
  </div>

  <div class="card mx-3">
    <!-- /.card-header -->
    <div class="card-body p-3">
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
                <a href="/user/{{ $user->id }}/edit" class="btn btn-warning btn-sm rounded text-white" style="font-weight: 600; padding: 5px 15px; margin-right: 5px;">
                  <i class="fas fa-edit"></i> Ubah
                </a>
                <a href="/user/{{ $user->id }}/hapus" onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-danger btn-sm rounded" style="font-weight: 600; padding: 5px 15px;">
                  <i class="fas fa-trash-alt"></i> Hapus
                </a>
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
