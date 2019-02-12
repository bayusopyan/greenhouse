@extends('layouts.app')

@section('content')
<div class="container bg-white table mt-2 col-lg-8 col-xs-12 p-5 mt-5 rounded shadow">
<h1>User</h1>
  <a href="{{ route('create_user') }}" class="btn btn-warning font-weight-bold"><i class="fas fa-plus"></i> Tambah</a>
  <table class="table bg-white mt-3">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Email</th>
      <th>Kelompok</th>
      <th align="right">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $user)
      <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>
          @if ($user->kelompok)
            {{$user->kelompok}}
          @elseif($user->admin)
            Admin
          @else
            Belum Terdaftar
          @endif
          
        </td>
        <td align="left">
          <a href="{{ route('edit_user',$user->id)}}" class="btn btn-primary font-weight-bold"><i class="fas fa-list-ul"></i> Sunting</i></a>          
        </td>
      </tr>                  
    @endforeach      
</table>
</div>
@endsection