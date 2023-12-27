@extends('unit.main')

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
    @if ($inboxes->count())
    <div class="list-group">
      @foreach ($inboxes as $surat)
        <a href="/inbox/{{ $surat->id }}" class="list-group-item list-group-item-action" aria-current="true">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">{{ $surat->instansi }} &#40;{{ $surat->pengirim }}&#41;</h5>
            <small>{{ $surat->created_at->diffForHumans() }}</small>
          </div>
          <small>{{ $surat->tujuan->nama_tujuan }} {{ $surat->waktu }}</small>
        </a>
        
        @endforeach
      </div>
    @else
      <p class="text-center fs-4">Tidak ada surat untuk saat ini.</p>
    @endif
    <div class="d-flex justify-content-end">
      {{ $inboxes->links() }}
    </div>
  </div>
</div>
@endsection