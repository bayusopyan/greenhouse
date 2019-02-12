@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">         
            <li class="list-group-item">
                <span class="btn btn-default" onclick="showMenu(0)">Edit Profil <i class="fas fa-chevron-down"></i></span>
            </li>
            <li class="list-group-item show-menu">
                <form method="POST" action="{{ route('update_tanaman',$data->id) }}">
                    @method('PATCH')
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Kode') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ $data->id }}" required autofocus readonly>

                            @if ($errors->has('id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>                                  
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
                    <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Keterangan') }}</label>
    
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('keterangan') ? ' is-invalid' : '' }}" name="keterangan" value="{{ $data->keterangan }}" required autofocus>
    
                                @if ($errors->has('keterangan'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('keterangan') }}</strong>
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
                <span class="btn btn-link" data-toggle="modal" data-target="#myModal">Hapus Tanaman</span>
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
                <form action="{{route('destroy_tanaman',$data->id)}}" class="form-inline" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger ml-2">Hapus</button>
                </form>
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Tidak</button>
            </div>
        
        </div>
    </div>
</div>

@endsection