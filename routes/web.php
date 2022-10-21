<?php

use Illuminate\Support\Facades\DB;

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

Route::get('/', function () {
    $data['data'] = DB::table('kriterias')
        ->select('*')
        ->join('students','kriterias.email_mhs','=','students.email_mhs')
        ->join('users','users.email','=','students.email_mhs')
        ->join('hasils','hasils.email_mhs','=','students.email_mhs')
        ->orderBy('hasil','DESC')->get();
    
        $data['donatur'] = DB::table('donaturs')->get();

        $data['donasi'] = DB::table('donasis')->get();
        
        $data['langsung'] = DB::table('langsungs')->get();

    return view('index_new',$data);
    // return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

// Register donatur dan mahasiswa
Route::get('/menuRegister', function(){
        $data['title'] = 'Menu Register';
        return view('auth.newRegister',$data);
});

Route::get('/registerMahasiswa', function(){
    return view('auth.registerMhs');
});

Route::get('/registerDonatur', function(){
    return view('auth.registerDonatur');
});

// login new
Route::get('/newLogin', function(){
    return view('auth.login_new');
});


Route::post('/addDonatur', 'registerController@donatur');
Route::post('/addStudent', 'registerController@student');

// Administrator
Route::get('/pendaftarNew','adminController@dataPendaftar');
Route::get('/dataPendaftar','adminController@Pendaftar');
Route::get('/detailPendaftar/{id}','adminController@detailPendaftar');
Route::get('/editMhsAdmin/{id}','adminController@editMhs');
Route::post('/prosesEditMhs','adminController@prosesMhs');
Route::get('/hapusMhs/{id}','adminController@hapusMhs');
Route::get('/profileAdm','adminController@index');
Route::post('/dataHasil', 'adminController@Hasil');
Route::get('/dataBantuan', 'adminController@bantu');
Route::post('/proses_editAdm', 'adminController@update'); 
Route::get('/editAdm/{id}', 'adminController@show');
Route::post('/validasiLangsung', 'adminController@validasiLangsung');
Route::get('/dataDonatur', 'adminController@donatur');
Route::get('/editDonatur/{id}','adminController@editDonatur');
Route::post('/prosesEditDonatur','adminController@prosesEditDonatur');
Route::get('/hapusDonatur/{id}','adminController@hapusDonatur');
Route::get('cetakBantuan','adminController@cetakBantu'); 
Route::get('/editPasswordAdm','adminController@editPassword'); 
Route::post('/changePassword','adminController@changePassword'); 
Route::get('/addDonaturAdm','adminController@addDonatur');
Route::post('/tambahDonatur','adminController@addDon');
Route::get('/dataBantuanUmum','adminController@dataBantuanUmum');
Route::post('/distribusi','adminController@distribusi');
Route::get('/infakAdmin','adminController@infakAdmin');
Route::get('/dataBantuanLangsung','adminController@dataBantuanLangsung');


// student
Route::get('/profileMah', 'StudentCotroller@index');
Route::get('/editMhs/{id}', 'StudentCotroller@edit');
Route::post('/proses_editMhs', 'StudentCotroller@update');
Route::get('/lengkapi', 'StudentCotroller@lengkapiS');
Route::post('/prosesLengkap', 'StudentCotroller@ProsesLengkapi'); 
Route::get('/registerStudent', 'StudentCotroller@create');
Route::post('/tambahStudent', 'StudentCotroller@tambahNew');
Route::get('/status', 'StudentCotroller@statusPendaftaran');
Route::get('/editPasswordStudent','StudentCotroller@editPasswordStudent');
Route::post('/changePasswordStudent','StudentCotroller@changePasswordStudent');
Route::get('/editLengkap/{email}','StudentCotroller@editLengkapi');
Route::post('/editSyarat','StudentCotroller@editSyarat');
Route::get('/umum','StudentCotroller@bantuanUmum');

// Donatur
Route::get('/profileDon', 'DonaturCotroller@index');
Route::get('/editDon/{id}', 'DonaturCotroller@edit'); 
Route::post('/proses_editDonatur', 'DonaturCotroller@update');  
// Route::get('/listMahasiswa', 'DonaturCotroller@mahasiswa'); 
Route::get('/detailMahasiswa/{id}', 'donaturCotroller@detailMahasiswa');
Route::post('/bantu', 'donaturCotroller@bantuMahasiswa');
Route::get('/bantuanMhs', 'donaturCotroller@bantuanMhs');
Route::get('/editPasswordDonatur','donaturCotroller@editPasswordDonatur');
Route::post('/changePasswordDonatur','donaturCotroller@changePasswordDonatur');
Route::get('/bantuanUmum','DonaturCotroller@bantuUmum');
Route::get('/jumlahUmum','DonaturCotroller@jumlahBantuan');
Route::post('/prosesUmum','DonaturCotroller@prosesUmum');
Route::post('/hitungBantuan','DonaturCotroller@hitungBantuan');
Route::get('/bantuAdmin','DonaturCotroller@bantuAdmin');
Route::post('/infakAdmin','DonaturCotroller@infakAdmin');
Route::post('/hitungInfak','DonaturCotroller@hitungInfak');
Route::get('/historyDonatur','DonaturCotroller@history');
Route::get('/cariHistory','DonaturCotroller@cariHistory');
Route::get('/listMahasiswa','DonaturCotroller@sliderMahasiswa');
Route::get('/bantuanLangsung','DonaturCotroller@bantuanLangsung');
Route::post('/beriLangsung','DonaturCotroller@beriLangsung');