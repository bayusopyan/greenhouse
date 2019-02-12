@extends('layouts.app')

@section('content')
<div class="container bg-white table mt-2 col-lg-8 col-xs-12 p-5 mt-5">
    <h1>Analisis</h1>
    <div class="form-inline">
      <div class="form-group">
        <label for="tanggal" class="pr-5">Tanggal : </label>
        <select class="form-control" id="tanggal" onchange="getLaporanPerbulan()">
          @foreach ($collection as $idx => $item)
              <option value="{{$idx}}" {{$idx == key($collection->toArray()) ? 'selected' : ''}}>{{date("d-F-Y", strtotime($idx))}}</option>
          @endforeach
        </select>
        <button class="btn btn-primary" onclick="printLaporan()">Print</button>
      </div>
    </div>
    <div id="target">
    </div>
</div>
@endsection