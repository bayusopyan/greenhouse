@extends('layouts.app')

@section('content')
<div class="container bg-white table mt-2 col-lg-8 col-xs-12 p-5 mt-5 rounded shadow">
<h1>Data Tanaman</h1>
  <table class="table bg-white col-md-12 col-xs-12 mt-3">
  <thead>
    <tr>
      <th>Kode Tanaman</th>
      <th>Nama Tanaman</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $d)  
      <tr>
        <td>{{$d->id}}</td>
        <td>{{$d->nama}}</td>
        <td>{{$d->status}}</td>
      </tr>                  
    @endforeach      
</table>
</div>
@endsection