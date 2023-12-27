@extends('tatausaha.main')

@section('container')

<div class="row form-container">
  <div class="col">
    {{-- <div class="toast-container position-fixed bottom-0 end-0 p-3">
      @if (session()->has('status'))
      <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header border-bottom-0">
          <button type="button" class="btn-close ms-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body fw-semibold">
          {{ session('status') }}
        </div>
      </div>
          
      @endif
    </div> --}}
    <div class="row justify-content-center">
      <div class="col-md-6">
          <form action="/arsip">
              <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
                  <button class="btn btn-success" type="submit">Search</button>
              </div>
          </form>
      </div>
    </div>
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
          
        <a href="/arsip/{{ $surat->id }}" class="list-group-item list-group-item-action">
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