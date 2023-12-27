@extends('tatausaha.main')

@section('container')
<div class="row form-container">
    <div class="col-md-6">
        <h3 class="mb-3 fw-normal text-center">Edit Surat</h3>
        <form action="/arsip/{{ $surat->id }}/update" method="POST">
            @csrf
            @method('PUT')
            <div class="row g-2 align-items-center">
                <div class="col-auto col-md-6">
                    <div class="mb-3">
                        <label for="instansi" class="form-label">Instansi</label>
                        <input type="text" name="instansi" class="form-control @error('instansi') is-invalid @enderror" id="instansi" value="{{ old('instansi', $surat->instansi) }}">
                        @error('instansi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="col-auto col-md-6">
                    <div class="mb-3">
                        <label for="pengirim" class="form-label">Pengirim</label>
                        <input type="text" name="pengirim" class="form-control @error('pengirim') is-invalid @enderror" id="pengirim" value="{{ old('pengirim', $surat->pengirim) }}">
                        @error('pengirim') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>
            
            <div class="row g-2 align-items-center">
                <div class="col-auto col-md-8">
                    <div class="mb-3">
                        <label for="no_surat" class="form-label">Nomor Surat</label>
                        <input type="text" name="no_surat" class="form-control @error('no_surat') is-invalid @enderror" id="no_surat" value="{{ old('no_surat', $surat->no_surat) }}">
                    </div>
                </div>
                <div class="col-auto col-md-4">
                    <div class="mb-3">
                        <label for="pengunjung" class="form-label">Jumlah Pengunjung</label>
                        <input type="text" name="pengunjung" class="form-control @error('pengunjung') is-invalid @enderror" id="pengunjung" value="{{ old('pengunjung', $surat->pengunjung) }}" autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="tujuan" class="form-label">Tujuan</label>
                <select class="form-select @error('tujuan') is-invalid @enderror" aria-label="Default select example" name="tujuan" id="tujuan" value="{{ old('tujuan', $surat->tujuan->nama_tujuan) }}" required>
                    <option disabled selected>-Pilih Tujuan-</option>
                    @foreach ($tujuans as $tujuan)
                    <option value="{{ $tujuan->id }}">{{ $tujuan->nama_tujuan }}</option>
                    @endforeach
                  </select>
                {{-- <input type="text" name="tujuan" class="form-control @error('tujuan') is-invalid @enderror" id="tujuan" value="{{ old('tujuan', $surat->tujuan) }}">
                @error('tujuan') <div class="invalid-feedback">{{ $message }}</div> @enderror --}}
            </div>
            <div class="row g-2 align-items-center">
                <div class="col-auto col-md-6">
                    <div class="mb-3">
                        <label for="date">Pilih Tanggal:</label>
                        <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" min="{{ date('Y-m-d') }}" value="{{ old('date', $date) }}">
                        @error('date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="col-auto col-md-6">
                    <div class="mb-3">
                        <label for="time">Pilih Jam:</label>
                        <input type="time" class="form-control @error('time') is-invalid @enderror" id="time" name="time" value="{{ old('time', $time) }}">
                        @error('time') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>
            <div class="d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
          </form>
    </div>
</div>

@endsection