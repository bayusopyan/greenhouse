@extends('layouts.app')

@section('content')
<div class="container bg-white table mt-2 col-lg-8 col-xs-12 p-5 mt-5">
<h1>Jadwal</h1>
  <a href="{{route('create_jadwal')}}" class="btn btn-warning font-weight-bold"><i class="fas fa-plus"></i> Tambah</a>
  <table class="table bg-white mt-3">
  <thead>
    <tr>
      <th>ID</th>
      <th>nama</th>
      <th>Tanggal Masuk</th>
      <th>Tanggal Keluar</th>
      <th>Kelompok</th>
      <th>Tanaman</th>
      <th>Jumlah Tanaman</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $d)  
      <tr>
        <td>{{$d->id}}</td>
        <td>{{$d->nama}}</td>
        <td>{{$d->tgl_masuk}}</td>
        <td>{{$d->tgl_keluar}}</td>
        <td>{{$d->kelompok}}</td>
        <td>{{$d->tanaman}}</td>
        <td>{{$d->jumlah_tanaman}}</td>
        <td>
          <a href="" class="btn btn-primary font-weight-bold disabled"><i class="fas fa-list-ul"></i> Sunting</i></a>
        </td>
      </tr>                  
    @endforeach      
</table>
</div>
@endsection