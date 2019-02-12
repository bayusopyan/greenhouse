{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script> --}}

    <div class="row mt-5">
      <div class="col-lg-6 container"><canvas id="cahayaChart"></canvas></div>
      <div class="col-lg-6 container"><canvas id="suhuChart"></canvas></div>
    </div>
    <div class="row">
      <div class="col-lg-6 container"><canvas id="phChart"></canvas></div>
      <div class="col-lg-6 container"><canvas id="ktChart"></canvas></div>
    </div>      
    
    
    
<div id="printable">
    <table class="table mt-5">
        <thead>
        <tr>
            <th scope="col">Hari</th>
            <th scope="col">Intensitas Cahaya</th>
            <th scope="col">Suhu</th>
            <th scope="col">pH</th>
            <th scope="col">Kelembaban Tanah</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($collection as $item)
        <tr>
            <th scope="row">{{$item->day}}</th>
            <td>{{$item->cahaya}}</td>
            <td>{{$item->suhu}}</td>
            <td>{{$item->ph}}</td>
            <td>{{$item->kt}}</td>            
        </tr>
        @endforeach
        </tbody>
    </table>
</div>