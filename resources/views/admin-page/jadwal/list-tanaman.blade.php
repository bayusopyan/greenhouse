    <table class="table bg-white mt-3">
      <thead>
        <tr>
          <th>Kode Tanaman</th>
          <th>Nama Tanaman</th>
          <th>Status</th>   
          <th>Aksi</th>        
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $d)  
          <tr>
            <td>{{$d->id}}</td>
            <td>{{$d->nama}}</td>
            <td>{{$d->status}}</td>
        
            <td>
                <p class="checkbox">
                    <input type="checkbox" id="{{$d->id}}" value="{{$d->id}}" name="anggotaKelompok[]"/ class="ct-checkbox">
                    <label for="{{$d->id}}"></label>
                </p> 
            </td>
          </tr>                  
        @endforeach      
    </table>

