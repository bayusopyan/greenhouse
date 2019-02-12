<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::group(['middleware' => ['web','auth']],function(){

    Route::prefix('home')->group(function () {
        Route::get('/', 'HomeController@dashboard')->name('home');
        Route::get('/tanaman', 'HomeController@data_tanaman')->name('data_tanaman');
    });


    Route::get('/',function(){
        if(\Auth::user()->admin == 0){
            return redirect()->route('home');
        }else{
            return redirect()->route('admin_dashboard');
        }
    });



    Route::prefix('admin')->group(function () {

        Route::get('/','AdminController@dashboard')->name('admin_dashboard');
        Route::get('/partial','AdminController@dashboardPartial')->name('admin_dashboard_partial');
        
        Route::prefix('user')->group(function () {
            Route::get('/','UserController@index_user')->name('index_user');
            Route::get('/create','UserController@create_user')->name('create_user');
            Route::get('/{id}','UserController@edit_user')->name('edit_user');
            Route::patch('/{id}','UserController@update_user')->name('update_user');
            Route::delete('/{id}','UserController@destroy_user')->name('destroy_user');
            Route::post('/','UserController@store_user')->name('store_user');
        });
       
        Route::prefix('kelompok')->group(function () {
            Route::get('/','KelompokController@index_kelompok')->name('index_kelompok');
            Route::get('/create','KelompokController@create_kelompok')->name('create_kelompok');
            Route::get('/{id}','KelompokController@edit_kelompok')->name('edit_kelompok');
            Route::post('/{id}/tambahAnggota','KelompokController@tambahAnggota')->name('tambahAnggota');
            Route::patch('/{id}/hapusAnggota','KelompokController@hapusAnggota')->name('hapusAnggota');
            Route::patch('/{id}','KelompokController@update_kelompok')->name('update_kelompok');
            Route::delete('/{id}','KelompokController@destroy_kelompok')->name('destroy_kelompok');
            Route::post('/','KelompokController@store_kelompok')->name('store_kelompok');
        });
        Route::prefix('tanaman')->group(function () {
            Route::get('/','TanamanController@index_tanaman')->name('index_tanaman');
            Route::get('/create','TanamanController@create_tanaman')->name('create_tanaman');
            Route::post('/','TanamanController@store_tanaman')->name('store_tanaman');  
            Route::get('/{id}','TanamanController@edit_tanaman')->name('edit_tanaman');
            Route::patch('/{id}','TanamanController@update_tanaman')->name('update_tanaman');
            Route::delete('/{id}','TanamanController@destroy_tanaman')->name('destroy_tanaman');
                        
        });
        Route::prefix('jadwal')->group(function () {
            Route::get('/','JadwalController@index_jadwal')->name('index_jadwal');
            Route::get('/create','JadwalController@create_jadwal')->name('create_jadwal');
            Route::get('/{id}','JadwalController@edit_jadwal')->name('edit_jadwal');
            Route::patch('/{id}','JadwalController@update_jadwal')->name('update_jadwal');
            Route::delete('/{id}','JadwalController@destroy_jadwal')->name('destroy_jadwal');
            Route::post('/','JadwalController@store_jadwal')->name('store_jadwal');           
        });             
    });

    Route::get('/cahaya','DeviceController@indexCahaya')->name('index_cahaya');
    Route::get('/suhu','DeviceController@indexCahaya')->name('index_suhu');
    Route::get('/ph','DeviceController@indexCahaya')->name('index_ph');
    Route::get('/kt','DeviceController@indexCahaya')->name('index_kt');

    Route::get('/getmsg','AdminController@getTanamanByJadwal');
    Route::get('/getstate','DeviceController@getState');
    Route::put('/state/{field}/{value}','DeviceController@update_state');
    Route::get('/laporan','DeviceController@index_laporan')->name('index_laporan');
    Route::get('/getLaporanPerBulan/{y}/{m}','DeviceController@getLaporanPerBulan')->name('getLaporanPerBulan');

});

Route::get('/test',function(){
    // date_default_timezone_set('Asia/Jakarta');
    // echo date('Y-m-d');
    // echo '<br>';
    // echo date('H:i:s');
    function random_float ($min,$max) {
        return ($min+lcg_value()*(abs($max-$min)));
     }

    $date = new DateTime();
    $date->setDate(2018, 1, 1);
    $finish = false;
    $i = 1;
    while($date->format('m')<=1){
        $cahaya = rand(1,1000);
        $suhu = rand(-40,40);
        $ph = random_float(0.1,7.0);
        $kt = rand(0,300);
        
        echo $i.') ';
        echo 'Intensitas Cahaya : '.$cahaya.', ';
        echo 'Suhu : '.$suhu.', ';
        echo 'PH : '.number_format($ph,1).', ';
        echo 'Kelembaban Tanah : '.$kt.', '; 
        echo 'Tanggal : '.$date->format('Y-m-d').', ';
        echo 'Jam : '.$date->format('H:i:s');
        $date->modify('+1 day');
        $i++;
        echo '<br>'; 
    }
    
    

});

