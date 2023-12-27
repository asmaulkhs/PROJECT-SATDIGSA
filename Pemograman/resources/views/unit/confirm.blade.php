@extends('unit.main')


@section('container')
<div class="row form-container">
    <div class="col-md-6">
        <h4 class="mb-3 fw-normal text-center">Status : <small class="{{ ($surat->status->nama_status === "Proses Pengajuan") ? 'text-warning' : ''}} {{ ($surat->status->nama_status === "Diterima") ? 'text-success' : ''}}{{ ($surat->status->nama_status === "Ditolak") ? 'text-danger' : ''}}">{{ $surat->status->nama_status }}</small></h4>
        <form action="">
            @csrf
            <div class="row g-2 align-items-center">
                <div class="col-auto col-md-6">
                    <div class="mb-3">
                        <label for="instansi" class="form-label">Instansi</label>
                        <input type="text" name="instansi" class="form-control @error('instansi') is-invalid @enderror" id="instansi" value="{{ old('instansi', $surat->instansi) }}" disabled>
                        @error('instansi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="col-auto col-md-6">
                    <div class="mb-3">
                        <label for="pengirim" class="form-label">Pengirim</label>
                        <input type="text" name="pengirim" class="form-control @error('pengirim') is-invalid @enderror" id="pengirim" value="{{ old('pengirim', $surat->pengirim) }}" disabled>
                        @error('pengirim') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>
            
            <div class="row g-2 align-items-center">
                <div class="col-auto col-md-8">
                    <div class="mb-3">
                        <label for="no_surat" class="form-label">Nomor Surat</label>
                        <input type="text" name="no_surat" class="form-control @error('no_surat') is-invalid @enderror" id="no_surat" value="{{ old('no_surat', $surat->no_surat) }}" disabled>
                        @error('no_surat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="col-auto col-md-4">
                    <div class="mb-3">
                        <label for="pengunjung" class="form-label">Jumlah Pengunjung</label>
                        <input type="text" name="pengunjung" class="form-control @error('pengunjung') is-invalid @enderror" id="pengunjung" value="{{ old('pengunjung', $surat->pengunjung) }}" disabled>
                        @error('pengunjung') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="tujuan" class="form-label">Tujuan</label>
                <input type="text" name="tujuan" class="form-control @error('tujuan') is-invalid @enderror" id="tujuan" value="{{ old('tujuan', $surat->tujuan->nama_tujuan) }}" disabled>
                @error('tujuan') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="row g-2 align-items-center">
                <div class="col-auto col-md-6">
                    <div class="mb-3">
                        <label for="date">Pilih Tanggal:</label>
                        <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" min="{{ date('Y-m-d') }}" value="{{ old('date', $date) }}" disabled>
                        @error('date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="col-auto col-md-6">
                    <div class="mb-3">
                        <label for="time">Pilih Jam:</label>
                        <input type="time" class="form-control @error('time') is-invalid @enderror" id="time" name="time" value="{{ old('time', $time) }}" disabled>
                        @error('time') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>
          </form>
          <div class="mb-3">
            
                @if($surat->status->nama_status === 'Proses Pengajuan')
                <form action="/inbox/{{ $surat->id }}/acc">
                    @csrf
                    <label for="alasan" class="col-form-label">Alasan Penolakan:</label>
                    <textarea class="form-control @error('alasan') is-invalid @enderror" id="alasan" name="alasan"></textarea>
                    @error('alasan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    <div class="row g-2 align-items-center mt-2">
                        <div class="col-auto col-md-6">
                            <button type="submit" name="action" class="btn btn-success d-inline" value="1">Terima</button>
                            <button type="submit" name="action" class="btn btn-danger d-inline" value="2">Tolak</button>
                            </div>
                        <div class="col-auto col-md-6">
                            <div class="d-md-flex justify-content-md-end">

                                <a  onclick="goBack()" class="btn btn-primary d-inline ">Kembali</a>
                            </div>
                        </div>
                        </div>
                </form>
                {{-- <button type="button" class="btn btn-danger d-inline" data-bs-toggle="modal" data-bs-target="#tolakmodal">Tolak</button> --}}
                @elseif($surat->status_id == '4')
                <form action="">
                    @csrf
                    <label for="alasan" class="col-form-label">Alasan Penolakan:</label>
                    <textarea class="form-control @error('alasan') is-invalid @enderror" id="alasan" name="alasan" disabled>{{$surat->penolakan->alasan ?? '' }}</textarea>
                    @error('alasan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    
                </form>
                <div class="d-md-flex justify-content-md-end mt-2">

                    <a  onclick="goBack()" class="btn btn-primary d-inline ">Kembali</a>
                </div>
                @else
                <div class="d-md-flex justify-content-md-end">

                    <a  onclick="goBack()" class="btn btn-primary d-inline ">Kembali</a>
                </div>
                @endif
                
                {{-- <div class="col-auto col-md-6">
                    <div class="d-flex justify-content-end">
                        <a  onclick="goBack()" class="btn btn-primary d-inline">Kembali</a>
                    </div>
                </div> --}}
            </div>
    </div>
</div>

@endsection