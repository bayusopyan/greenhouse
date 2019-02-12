@extends('layouts.app')

@section('content')
<div class="container bg-white table mt-2 col-lg-8 col-xs-12 p-5 mt-5 rounded shadow">
<h1>Kelompok</h1>
  <a href="{{ route('create_kelompok') }}" class="btn btn-warning menu font-weight-bold"><i class="fas fa-plus"></i> Tambah</a>
  <table class="table bg-white mt-3">
  <thead>
    <tr>
      <th>Kode Kelompok</th>
      <th>Nama Kelompok</th>
      <th>Jumlah Anggota</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $d)  
      <tr>
        <td>{{$d->id}}</td>
        <td>{{$d->nama}}</td>
        <td>{{$d->total}}</td>
        <td>
            <a href="{{ route('edit_kelompok',$d->id)}}" class="btn btn-primary font-weight-bold">
                <i class="fas fa-list-ul"></i> Sunting</i>
            </a>                
        </td>
      </tr>
      
    
    @endforeach      
</table>

@endsection