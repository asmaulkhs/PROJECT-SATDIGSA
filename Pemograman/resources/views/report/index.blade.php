@extends($layout)

@section('container')
<div class="row form-container">
    <div class="col">
        <div class="justify-content-between flex-wrap flex-md-nowrap align-items-center border-bottom mb-2">
            <h1 class="h2 text-center">Report</h1>      
        </div>
        <form method="post" action="/report/export-pdf">
        @csrf
        <label for="start_date" class="form-label">Tanggal Awal:</label>
        <input type="date" name="start_date" class="form-control mb-2  @error('start_date') is-invalid @enderror" required>
        @error('start_date') <div class="invalid-feedback">{{ $message }}</div> @enderror

        <label for="end_date" class="form-label">Tanggal Akhir:</label>
        <input type="date" name="end_date" class="form-control mb-2  @error('end_date') is-invalid @enderror" required>
        @error('end_date') <div class="invalid-feedback">{{ $message }}</div> @enderror

        @if ($layout === 'tatausaha.main'|| $layout === 'resepsionis.main')
        <label for="tujuan" class="form-label">Tujuan :</label>
        <select class="form-select @error('tujuan') is-invalid @enderror mb-2" aria-label="Default select example" name="tujuan" id="tujuan" required>
            <option value="" disabled selected>-Pilih Tujuan-</option>
            <option value="10">Semua</option>
            @foreach ($tujuans as $tujuan)
            <option value="{{ $tujuan->id }}">{{ $tujuan->nama_tujuan }}</option>
            @endforeach
          </select>
        @endif
        
        <div class="d-md-flex justify-content-md-end">
            <button type="submit" class="btn btn-primary mt-2">Export PDF</button>
        </div>
        
        </form>
    </div>
</div>
@endsection