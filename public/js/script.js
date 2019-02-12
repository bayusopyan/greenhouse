
function showMenu(pilih){
  var menu = document.getElementsByClassName("choose-btn");
  var menuTarget = document.getElementsByClassName("show-menu")

  for (let index = 0; index < menuTarget.length; index++) {
    if(pilih == index){
      // menuTarget[index].style.display = 'block';
      $(".show-menu:eq("+index+")").show(100);
      continue;
    }
    // menuTarget[index].style.display = 'none';
    $(".show-menu:eq("+index+")").hide(100);
  }
}

function hapusAnggota(route,name){
  console.log(route);
  console.log(name);
  document.getElementById('hapus-anggota').setAttribute('action',route);
  var now = document.getElementById('hapus-anggota').getAttribute('action');
  console.log(now);
}


var checkbox = document.getElementsByClassName('checkbox');
n = checkbox.length;
if(n >= 4){
  document.getElementById('modal-body').style.height = '250px';
  document.getElementById('modal-body').style.overflowY = "scroll";

}

function showUser(id) {
  $.ajaxSetup({

      headers: {

          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

      }

  });           
  
  $.ajax({
      type:'GET',
      url:route('getLaporanPerBulan'),
      data:{
        id: id,
      },
      success:function(data) {
         $("#target").html(data.html);
      }
   });
}

function getLaporanPerbulan() {

    var tanggal = $("option:selected").val()
    var objDate = new Date(tanggal);
    
    var y = (objDate.getFullYear());
    var m = (objDate.getMonth()+1);

    console.log(objDate);
    $.ajaxSetup({
  
        headers: {
  
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  
        }
  
    });           
    
    $.ajax({
        type:'GET',
        url:route('getLaporanPerBulan',[y,m]),
        data:{

        },
        success:function(data) {
           $("#target").html(data.html);
           var ctCahaya = document.getElementById('cahayaChart').getContext('2d');
           var cahayaChart = new Chart(ctCahaya, {
               // The type of chart we want to create
               type: 'line',
         
               // The data for our dataset
               data: {
                   labels: ["Minggu ke-1", "Minggu ke-2", "Minggu ke-3", "Minggu ke-4","Minggu ke-5","Minggu ke-6"],
                   datasets: [{
                       label: "Intensitas Cahaya",
                       borderColor: 'rgb(255, 99, 132)',
                       data: data['cahaya'],
                       fill: false
                   },
                                 
                 ]
               },
         
               // Configuration options go here
               options: {}
           });
           var ctSuhu = document.getElementById('suhuChart').getContext('2d');
           var suhuChart = new Chart(ctSuhu, {
               // The type of chart we want to create
               type: 'line',
         
               // The data for our dataset
               data: {
                   labels: ["Minggu ke-1", "Minggu ke-2", "Minggu ke-3", "Minggu ke-4","Minggu ke-5","Minggu ke-6"],
                   datasets: [
                   {
                       label: "Suhu",
                       borderColor: '#36A2EB',
                       data: data['suhu'],
                       fill: false
                   },
                                 
                 ]
               },
         
               // Configuration options go here
               options: {}
           });
           var ctPh = document.getElementById('phChart').getContext('2d');
           var phChart = new Chart(ctPh, {
               // The type of chart we want to create
               type: 'line',
         
               // The data for our dataset
               data: {
                   labels: ["Minggu ke-1", "Minggu ke-2", "Minggu ke-3", "Minggu ke-4","Minggu ke-5","Minggu ke-6"],
                   datasets: [
                   {
                       label: "pH",
                       borderColor: '#FFCD56',
                       data: data['ph'],
                       fill: false
                   }, 
                                  
                 ]
               },
         
               // Configuration options go here
               options: {}
           });
           var ctKt = document.getElementById('ktChart').getContext('2d');
           var ktChart = new Chart(ctKt, {
               // The type of chart we want to create
               type: 'line',
         
               // The data for our dataset
               data: {
                   labels: ["Minggu ke-1", "Minggu ke-2", "Minggu ke-3", "Minggu ke-4","Minggu ke-5","Minggu ke-6"],
                   datasets: [ 
                   {
                       label: "Kelembaban Tanah",
                       borderColor: '#4BC0C0',
                       data: data['kt'],
                       fill: false
                   },                                   
                 ]
               },
         
               // Configuration options go here
               options: {}
           });                                    
        }
     });
  }


function updateState(dev,kondisi){
  $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });           
    
    $.ajax({
        type:'PUT',
        url:'/state/'+dev+'/'+kondisi,
        success:function(data) {
            
        }
    });
}

function otParanet(){
  var at = document.getElementById('auto-paranet').checked;
  if(at){
      document.getElementById('paranet').disabled = true;
      document.getElementById('paranet').checked = false;
      updateState('paranet','auto');
  }else{
      document.getElementById('paranet').disabled = false;
      updateState('paranet','tutup');
  }
}

function paranet(){
  var at = document.getElementById('paranet').checked;
  if(at){
      updateState('paranet','buka');
      document.getElementById('auto-paranet').checked = false;

  }else{
      updateState('paranet','tutup');
  }
}

function penyiraman(){
    var at = document.getElementById('penyiraman').checked;
    if(at){
        updateState('relay','relay_on');
        document.getElementById('auto-penyiraman').checked = false;
  
        
    }else{
        updateState('relay','relay_off');
    }
  }


function otPenyiraman(){
  var at = document.getElementById('auto-penyiraman').checked;
  if(at){
      document.getElementById('penyiraman').disabled = true;
      document.getElementById('penyiraman').checked = false;
      updateState('relay','auto');
  }else{
      document.getElementById('penyiraman').disabled = false;
      updateState('relay','relay_off');
  }
}    

function getState(dev,kondisi){
    $.ajaxSetup({
  
          headers: {
  
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  
          }
  
      });           
      
      $.ajax({
          type:'GET',
          url:'/getstate',
          success:function(data) {
                var paranet = data[0]['value'];
                var relay = data[1]['value'];

                if(paranet == 'auto'){
                    $('#auto-paranet').prop('checked',true);
                }else if(paranet == 'buka'){
                    $('#paranet').prop('checked',true);
                }

                if(relay == 'auto'){
                    $('#auto-penyiraman').prop('checked',true);
                }else if(relay == 'relay_on'){
                    $('#penyiraman').prop('checked',true);
                }                
          }
      });
  }

var pathname = window.location.href;
var admin_dashboard = route('admin_dashboard')['template'];
var home = route('home')['template'];

if((pathname == home)||(pathname == admin_dashboard)){
    getState();
    let refreshPage = setInterval(function(){
      //window.location.reload(1);
      $.ajax({
          type:'GET',
          url:'/admin/partial',
          success:function(data) {
            $('#dashboard').html($data);              
          }
      });
    }, 5000);        
}

function routeCheck(routeName){
    var pathname = window.location.href;
    if(pathname == routeName){
        return true
    }
    
    return false
}

if(routeCheck(route('index_laporan'))){
    $('option:first').trigger('change');
}


function printLaporan() 
{
  let divToPrint = document.getElementById('printable');

  let newWin = window.open('','Print-Window');

  let baseURL = window.location.origin;

  let tanggal = $("option:selected").val()

  newWin.document.open();

  newWin.document.write('<html><head><link href="'+baseURL+'/css/app.css" rel="stylesheet"><link href="'+baseURL+'/css/style.css" rel="stylesheet"></head><body onload="window.print()"><h2>Laporan Harian Rumah Kaca</h2><br><span>Tanggal: '+tanggal+'</span><br><br>'+divToPrint.innerHTML+'</body><script>console.log("'+baseURL+'")</script></html>');

  newWin.document.close();
}
    

    