@extends($layout)
    
@section('container')
<div class="row form-container">
    <div class="col">
        <div class="justify-content-between flex-wrap flex-md-nowrap align-items-center border-bottom">
            <h1 class="h2 text-center">Jadwal</h1>
            
          </div>
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed fw-semibold fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                  Hari Ini
                </button>
              </h2>
              <div id="flush-collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionFlushExample">
                @if ($today->count())
                <div class="accordion-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Instansi</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Tujuan</th>
                                <th scope="col">Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($today as $surat)
                              <tr>
                                <td>{{ $surat->instansi }}</td>
                                <td>{{ $surat->pengirim }}</td>
                                <td>{{ $surat->tujuan->nama_tujuan }}</td>
                                <td>{{ $surat->waktu }}</td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                @else
                    
                <div class="accordion-body">Tidak ada jadwal untuk hari ini.</div>
                @endif
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed fw-semibold fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                  Minggu Ini
                </button>
              </h2>
              <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                @if ($week->count())
                <div class="accordion-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Instansi</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Tujuan</th>
                                <th scope="col">Waktu</th>
                            </tr>
                        </thead>
                        @foreach ($week as $surat)
                            <tbody>
                              <tr>
                                <td>{{ $surat->instansi }}</td>
                                <td>{{ $surat->pengirim }}</td>
                                <td>{{ $surat->tujuan->nama_tujuan }}</td>
                                <td>{{ $surat->waktu }}</td>
                              </tr>
                            </tbody>
                            @endforeach
                          </table>
                        </div>
                @else
                    
                <div class="accordion-body">Tidak ada jadwal untuk Minggu ini.</div>
                @endif
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed fw-semibold fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                  Bulan Ini
                </button>
              </h2>
              <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                @if ($month->count())
                <div class="accordion-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Instansi</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Tujuan</th>
                                <th scope="col">Waktu</th>
                            </tr>
                        </thead>
                        @foreach ($month as $surat)
                            <tbody>
                              <tr>
                                <td>{{ $surat->instansi }}</td>
                                <td>{{ $surat->pengirim }}</td>
                                <td>{{ $surat->tujuan->nama_tujuan }}</td>
                                <td>{{ $surat->waktu }}</td>
                              </tr>
                            </tbody>
                            @endforeach
                          </table>
                        </div>
                @else
                    
                <div class="accordion-body">Tidak ada jadwal untuk Bulan ini.</div>
                @endif
              </div>
            </div>
          </div>
    </div>
</div>

@endsection