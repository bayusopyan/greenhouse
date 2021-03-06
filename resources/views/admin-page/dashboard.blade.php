@extends('layouts.app')

@section('content')
<div id="dashboard">
    <div class="container mt-5" style=" width:100%;">
        <div class="card-deck m-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title d-flex justify-content-center">Intensitas Cahaya</h4>
                    <h1 class="card-text d-flex justify-content-center"><span style="font-size:12vh;">{{$md->cahaya}} lux</span></h1>
                </div> 
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title d-flex justify-content-center">Suhu</h4>
                    <h1 class="card-text d-flex justify-content-center"><span style="font-size:12vh">{{$md->suhu}}° C</span></h1>
                </div> 
            </div>              
        </div>

        <div class="card-deck m-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title d-flex justify-content-center">PH</h4>
                    <h1 class="card-text d-flex justify-content-center"><span style="font-size:12vh;">{{$md->ph}}</span></h1>
                </div> 
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title d-flex justify-content-center">Kelembaban Tanah</h4>
                    <h1 class="card-text d-flex justify-content-center"><span style="font-size:12vh">{{$md->kt}} %</span></h1>
                </div> 
            </div>              
        </div>    
        
        {{-- <div class="card-deck m-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title d-flex justify-content-center">Jumlah Tanaman</h4>
                    <h1 class="card-text d-flex justify-content-center"><span style="font-size:15vh">{{$md->proses}}</span></h1>
                    <a href="{{route('index_cahaya')}}" class="btn d-flex justify-content-center btn-ct">Detail</a>                
                </div> 
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title d-flex justify-content-center">Jumlah Panen</h4>
                    <h1 class="card-text d-flex justify-content-center"><span style="font-size:15vh">{{$md->panen}}</span></h1>
                    <a href="{{route('index_cahaya')}}" class="btn d-flex justify-content-center btn-ct">Detail</a>
                </div> 
            </div>           
        </div>  --}}

        <div class="card-deck m-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title d-flex justify-content-center">Paranet</h4>
                    <div class="card-text d-flex justify-content-center">
                        <div class="checkbox  col-lg-12">
                            <div class="row d-flex justify-content-around">
                                <span class="btn btn-default disabled font-weight-bold">Manual</span>
                                <input type="checkbox" class="switch_1 pull-right" id="paranet" onclick="paranet()">            
                            </div>   
                            <div class="row d-flex justify-content-around">
                                <span class="btn btn-default disabled font-weight-bold">Otomatis</span>
                                <input type="checkbox" class="switch_1 pull-right" id="auto-paranet" onclick="otParanet()">            
                            </div>                                               
                        </div>
                    </div> 
                </div> 
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title d-flex justify-content-center">Penyiraman</h4>
                    <div class="card-text d-flex justify-content-center">
                        <div class="checkbox  col-lg-12">
                            <div class="row d-flex justify-content-around">
                                <span class="btn btn-default disabled font-weight-bold">Manual</span>
                                <input type="checkbox" class="switch_1 pull-right" id="penyiraman" onclick="penyiraman()">            
                            </div>   
                            <div class="row d-flex justify-content-around">
                                <span class="btn btn-default disabled font-weight-bold">Otomatis</span>
                                <input type="checkbox" class="switch_1 pull-right" id="auto-penyiraman" onclick="otPenyiraman()">            
                            </div>                                               
                        </div>
                    </div> 
                </div> 
            </div>                        
        </div>     
    </div>
</div>
@endsection
