@extends('resepsionis.tamu')

@section('container')
<div class="row justify-content-center">
    <div class="col-md-6">
        <form action="/tamu">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}" autocomplete="off">
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
  @isset ($tamu)
    @if ($tamu->count())
    <div class="list-group">
        @foreach ($tamu as $surat)
            
            <a href="/tamu/{{ $surat->id }}" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">{{ $surat->instansi }} &#40;{{ $surat->pengirim }}&#41;</h5>
                <small> {{ $surat->waktu }}</small>
            </div>
            <div class="d-flex w-100 justify-content-between">
                <small>{{ $surat->tujuan->nama_tujuan }}</small>
                
            </div>
            </a>
            
            @endforeach
        </div>
    @else
    <p class="text-center fs-4 pt-4">Tidak ditemukan janji atau Cari kembali dengan benar!</p>
    @endif

@else
    <p class="text-center fs-4 pt-4">Cari Janji Sesuai Nama atau Instansi Anda</p>
@endisset
@endsection