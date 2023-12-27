@extends('resepsionis.main')

@section('container')
<div class="row form-container">
  <div class="col">
    <h3 class="mb-3 fw-normal text-center">Hai! Berikut merupakan tamu hari ini!</h3>
      @if ($today->count())
                
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Instansi</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tujuan</th>
                    <th scope="col">Pengunjung</th>
                    <th scope="col">Waktu</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($today as $surat)
                  <tr>
                    <td>{{ $surat->instansi }}</td>
                    <td>{{ $surat->pengirim }}</td>
                    <td>{{ $surat->tujuan->nama_tujuan }}</td>
                    <td>{{ $surat->pengunjung }}</td>
                    <td>{{ $surat->waktu }}</td>
                    <td class="{{ ($surat->tamu->datang === 1) ? 'text-success' : '' }} {{ ($surat->tamu->datang === 0) ? 'text-danger' : '' }} {{ ($surat->tamu->datang === null) ? 'text-warning' : '' }}">
                      @if ($surat->tamu->datang === 1)
                        Datang
                    @elseif($surat->tamu->datang === 0)
                      Tidak Datang
                    @else
                        Belum Datang
                    @endif
                      </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              
      @else
      <div class="d-flex justify-content-center my-5">

        <p class="fs-4">Sepertinya tidak ada tamu untuk hari ini!</p>
      </div>
      
      @endif
  </div>
</div>

@endsection