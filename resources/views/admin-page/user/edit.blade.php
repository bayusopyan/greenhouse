@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <form method="POST" action="{{ route('update_user',$data->id) }}">
                @method('PATCH')                     
                @csrf
                <ul class="list-group">
                    <li class="list-group-item">
                        <span class="btn btn-default" onclick="showMenu(0)">Edit Profil <i class="fas fa-chevron-down"></i></span>
                    </li>
                    <li class="list-group-item toggle-menu show-menu" id="edit-profil">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $data->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $data->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
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
                    </li>
                    <li class="list-group-item">
                        <span class="btn btn-default" onclick="showMenu(1)">Ganti Password <i class="fas fa-chevron-down"></i></span>                                
                    </li>
                    <li class="list-group-item toggle-menu show-menu" id="ganti-password">
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password Baru') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="" >

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                        

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
                            </div>
                        </div>   
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Ganti Password') }}
                                </button>
                            </div>
                        </div>                             
                    </li>
                    @if ($data->kelompok)
                        <li class="list-group-item">
                            <span class="btn btn-default" onclick="showMenu(2)">Ganti Kelompok <i class="fas fa-chevron-down"></i></span>                                 
                        </li>
                        <li class="list-group-item toggle-menu show-menu" id="ganti-kelompok">
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Kelompok') }}</label>

                                <div class="col-md-6 d-flex justifiy-content-ceneter">
                                    <select name="kelompok" id="" class="pr-3 pl-3">
                                        @foreach ($kelompok as $item)
                                            @if($item->id == $data->kelompok)
                                                <option value="{{$item->id}}" selected>{{$item->nama}}</option>
                                            @else
                                                <option value="{{$item->id}}">{{$item->nama}}</option>
                                            @endif
                                        @endforeach
                                    </select>

                                    @if ($errors->has('kelompok'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('kelompok') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>                        

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Ganti Kelompok') }}
                                    </button>
                                </div>
                            </div>
                        </li>
                    @elseif($data->admin)                        
                    @else
                        <li class="list-group-item">
                            <span class="btn btn-default" onclick="showMenu(2)"><i class="fas fa-plus"></i> Tambah Kelompok</span>                                 
                        </li>
                        <li class="list-group-item toggle-menu show-menu" id="ganti-kelompok">
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Kelompok') }}</label>

                                <div class="col-md-6 d-flex justifiy-content-ceneter">
                                    <select name="kelompok" id="" class="pr-3 pl-3">
                                        @foreach ($kelompok as $item)
                                            <option value="{{$item->id}}">{{$item->nama}}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('kelompok'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('kelompok') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>                        

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Tambah Kelompok') }}
                                    </button>
                                </div>
                            </div>
                        </li>                                                      
                    @endif
                    <li class="list-group-item">
                        <span class="btn btn-link" data-toggle="modal" data-target="#myModal">Hapus User</span>
                    </li>                    
                </ul>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Konfirmasi Hapus</h4>
            {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            Apakah anda yakin ingin menghapus data ini ?
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <form action="{{ route('destroy_user',$data->id)}}" class="form-inline" method="post">
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