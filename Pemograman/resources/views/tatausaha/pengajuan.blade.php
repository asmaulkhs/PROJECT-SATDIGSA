@extends('tatausaha.main')

@section('container')

<div class="row form-container">
  <div class="col">
    
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
    @if ($arsip->count())
    <div class="list-group">
      @foreach ($arsip as $surat)
          
        <a href="/pengajuan/{{ $surat->id }}" class="list-group-item list-group-item-action">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">{{ $surat->instansi }} &#40;{{ $surat->pengirim }}&#41;</h5>
            <small>{{ $surat->created_at->diffForHumans() }}</small>
          </div>
          <div class="d-flex w-100 justify-content-between">
            <small>{{ $surat->tujuan->nama_tujuan }} {{ $surat->waktu }}</small>
            <small class="{{ ($surat->status->nama_status === "Proses Pengajuan") ? 'text-warning' : ''}} {{ ($surat->status->nama_status === "Diterima") ? 'text-success' : ''}}{{ ($surat->status->nama_status === "Ditolak") ? 'text-danger' : ''}}"> {{ $surat->status->nama_status }} </small>
          </div>
        </a>
        
        @endforeach
      </div>
    @else
      <p class="text-center fs-4">Tidak ditemukan surat.</p>
    @endif

    <div class="d-flex justify-content-end">
      {{ $arsip->links() }}
    </div>
  </div>
</div>

@endsection