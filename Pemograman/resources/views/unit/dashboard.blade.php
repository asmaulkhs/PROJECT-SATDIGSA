@extends('unit.main')

@section('container')
<div class="row form-container">
  <div class="col">
    {!! $chart->container() !!}
  </div>
</div>
{!! $chart->script() !!}
@endsection