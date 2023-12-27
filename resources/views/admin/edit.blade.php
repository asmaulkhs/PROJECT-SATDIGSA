@extends('admin.main')

@section('container')
<a onclick="goBack()" class="text-decoration-none text-dark"><span><i class="bi bi-caret-left-fill"></i></span>Kembali</a>
<div class="row justify-content-center m-3">
    <h4 class="mb-3">Kelola Akun {{ $user->nama }}</h4>
    <form action="/kelola-akun/{{ $user->id }}" method="POST">
        @method('PUT')
        @csrf
        <div class="col-md-6 mb-2">
            <label for="new_pass" class="form-label">Ganti Password :</label>
            <input type="text" class="form-control @error('new_pass') is-invalid @enderror" id="new_pass" name="new_pass" autocomplete="off" required>
            @error('new_pass') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="col-md-6 d-flex justify-content-end">
            <button class="btn btn-primary">Ganti Password</button>
        </div>
    </form>
</div>
@endsection