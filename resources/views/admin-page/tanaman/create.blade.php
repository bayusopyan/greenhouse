@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card p-5 shadow">
                <div class="card-body d-flex justify-content-center">
                    <h2>Tambah Data Tanaman</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('store_tanaman') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="id" type="text" class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}" name="id" value="{{ old('id') }}" required autofocus placeholder="Kode">

                                @if ($errors->has('id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 mt-3">
                                <input id="name" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ old('nama') }}" required autofocus placeholder="Nama">

                                @if ($errors->has('nama'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 mt-3">
                                <input id="name" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="keterangan" value="{{ old('nama') }}" required autofocus placeholder="Keterangan">

                                @if ($errors->has('nama'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                        
                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary col-md-12 font-weight-bold mt-3">
                                    {{ __('Simpan') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection