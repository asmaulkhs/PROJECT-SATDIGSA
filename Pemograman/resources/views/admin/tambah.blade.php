@extends('admin.main')

@section('container')
<a href="/" class="text-decoration-none text-dark"><span><i class="bi bi-caret-left-fill"></i></span>Kembali</a>
<div class="row form-container">
    <div class="col-md-6">
        <h3 class="mb-3 fw-normal text-center">Tambah Akun</h3>
        <form action="/tambah-akun" method="post">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" value="{{ old('nama') }}" autocomplete="off" required>
                        @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan</label>
                <select class="form-select @error('jabatan') is-invalid @enderror" aria-label="Default select example" name="jabatan" id="jabatan" value="{{ old('jabatan') }}" required>
                    <option disabled selected>-Pilih Jabatan-</option>
                    <option value="1">Unit Akademik</option>
                    <option value="2">Unit Mahasiswa</option>
                    <option value="3">Unit Kerjasama</option>
                    <option value="4">Unit Kepegawaian</option>
                    <option value="5">Tatausaha</option>
                    <option value="6">Resepsionis</option>
                    <option value="7">Admin</option>
                  </select>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" autocomplete="off" required>
                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="text" name="password" id="password" class="form-control @error('password') is-invalid @enderror" autocomplete="off" required>
                @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-primary">Tambah Akun</button>
            </div>
          </form>
    </div>
</div>
@endsection