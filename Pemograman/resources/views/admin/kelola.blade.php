@extends('admin.main')

@section('container')
<a  href="/" class="text-decoration-none text-dark"><span><i class="bi bi-caret-left-fill"></i></span>Kembali</a>
<div class="row justify-content-center my-3">
    <div class="col">
        <h3 class="mb-3">Kelola Akun</h3>
        <div class="row justify-content-center">
            <div class="col-md-6">
                @if(session()->has('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif
            </div>
        </div>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Jabatan</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
                @foreach ($users as $key => $user)
                <tr>
                  <th scope="row">{{ $key + 1 }}</th>
                  <td>{{ $user->nama }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->jabatan->nama_jabatan }}</td>
                  <td>
                    <a href="/kelola-akun/{{ $user->id }}" class="btn btn-warning border-0 text-white">
                        <i class="bi bi-pencil"></i></a>
                    <form action="/kelola-akun/{{ $user->id }}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger border-0" onclick="return confirm('Apakah benar ingin dihapus?')">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                  </td>
                </tr>
                @endforeach
            </tbody>
          </table>
    </div>
</div>
@endsection