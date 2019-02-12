@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">         
            <li class="list-group-item">
                <span class="btn btn-default" onclick="showMenu(0)">Edit Profil <i class="fas fa-chevron-down"></i></span>
            </li>
            <li class="list-group-item show-menu">
                <form method="POST" action="{{ route('update_kelompok',$data->id) }}">
                    @method('PATCH')
                    @csrf              
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ $data->nama }}" required autofocus>

                            @if ($errors->has('nama'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nama') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Simpan') }}
                            </button>
                        </div>
                    </div>
                </form>
            </li>
            <li class="list-group-item">
                <span class="btn btn-default" onclick="showMenu(1)">Anggota <i class="fas fa-chevron-down"></i></span>
            </li>
            <li class="list-group-item show-menu">
                <form method="POST" action="{{ route('store_kelompok') }}">
                    @csrf              
                    <div class="container">
                        <ul class="list-group list-group-flush">
                            @foreach ($anggota as $item)
                                <li class="list-group-item d-flex justify-content-between">
                                    <span class="anggotaName">{{$item->name}}</span>
                                    <span class="border btn" data-toggle="modal" data-target="#hapusAnggota" onclick="hapusAnggota('{{ route('hapusAnggota',$item->id)}}','{{$item->id}}')"><i class="fas fa-times"></i></span>
                                </li>
                            @endforeach
                            <li class="list-group-item d-flex justify-content-end">
                                <span class="border btn" data-toggle="modal" data-target="#anggotaReady"><i class="fas fa-plus"></i> Tambah</span>
                            </li>                              
                        </ul>
                    </div>
                </form>
            </li>
            <li class="list-group-item">
                <span class="btn btn-link" data-toggle="modal" data-target="#myModal">Hapus Kelompok</span>
            </li>                                                      

        </div>
    </div>
</div>
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Konfirmasi Hapus</h4>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                Apakah anda yakin ingin menghapus data ini ?
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
                <form action="{{ route('destroy_kelompok',$data->id)}}" class="form-inline" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger ml-2">Hapus</button>
                </form>
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Tidak</button>
            </div>
        
        </div>
    </div>
</div>

<div class="modal fade" id="anggotaReady">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Pilih Anggota</h4>
        </div>
        <form action="{{ route('tambahAnggota',$data->id)}}" id="tambahAnggota" method="post">        
            <!-- Modal body -->
            <div class="modal-body" id="modal-body">
                @csrf
                @foreach ($nganggur as $item)
                    <p class="checkbox">
                        <input class="ct-checkbox" type="checkbox" id="{{$item->id}}" value="{{$item->id}}" name="anggotaKelompok[]"/>
                        <label for="{{$item->id}}">{{$item->name}}</label>
                    </p>                      
                @endforeach                              
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Batal</button>
                {{-- </form> --}}
            </div>
        </form>
        
        </div>
    </div>
</div>

<div class="modal fade" id="hapusAnggota">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Hapus Anggota</h4>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            Apakah anda yakin ingin menghapus 
            <span id="namaTarget"></span>
            dari kelompok ?
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <form action="as" class="form-inline" method="post" id="hapus-anggota">
                @csrf
                @method('PATCH')
                <button class="btn btn-sm btn-danger ml-2">Hapus</button>
            </form>
            <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Tidak</button>
        </div>
        
        </div>
    </div>
</div>
@endsection