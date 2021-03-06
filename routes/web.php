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
// URL AWAL
Route::get('/', 'HomeController@index');

Route::get('auth','AuthController@showLoginForm')->name('login');
Route::post('auth','AuthController@loginproses')->name('login.post');
Route::post('logout','AuthController@logout')->name('logout');

// group route prefix admin
Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function()
{
    Route::get('/home', 'HomeController@index')->name('home');

    // Group Route Master
    Route::group(['namespace' => 'Klaim'], function() {
        // autocompleted
        Route::get('/bpjs/kelas','BpjsController@getKelas')->name('bpjs.kelas');
        Route::get('/bpjs/diagnosa','BpjsController@getDiagnosa')->name('bpjs.diagnosa');
        Route::get('/bpjs/poli','BpjsController@getPoli')->name('bpjs.poli');
        Route::get('/bpjs/dpjp','BpjsController@getDpjp')->name('bpjs.dpjp');
        Route::get('/bpjs/dpjp/dokter','BpjsController@getListDpjp')->name('bpjs.dpjp.dokter');
        Route::get('/bpjs/faskes','BpjsController@getFaskes')->name('bpjs.faskes');

        Route::get('/bpjs/listrujukan','BpjsController@getListRujukan')->name('bpjs.listrujukan');
        Route::get('/bpjs/listrujukan/rs','BpjsController@getListRujukanRS')->name('bpjs.listrujukan.rs');

        Route::get('/bpjs/cekrujukan','BpjsController@getCekRujukan')->name('bpjs.cek.rujukan');
        Route::get('/bpjs/cekrujukanrs','BpjsController@getCekRujukanRS')->name('bpjs.cek.rujukan.rs');
        Route::get('/bpjs/rujukan','BpjsController@getRujukan')->name('bpjs.rujukan');
        Route::get('/bpjs/rujukan/rs','BpjsController@getRujukanRS')->name('bpjs.rujukan.rs');

        Route::get('/bpjs/history','BpjsController@getHistory')->name('bpjs.history');
        Route::get('/bpjs/history/peserta','BpjsController@getHistoryPeserta')->name('bpjs.history.peserta');
        Route::get('/bpjs/cekhistory','BpjsController@getcekHistory')->name('bpjs.cekhistory');
        Route::get('/rujukan/internal','RujukanController@getRujukanInternal')->name('rujukan.internal');
        Route::get('/rujukan/nosurat','RujukanController@getNoSurat')->name('nosurat.internal');
        Route::get('/rujukan/nosurat/one','RujukanController@getOneNoSurat')->name('nosurat.internal.one');
        Route::get('/bpjs/provinsi','BpjsController@getProvinsi')->name('bpjs.provinsi');
        Route::get('/bpjs/kabupaten','BpjsController@getKabupaten')->name('bpjs.kabupaten');
        Route::get('/bpjs/kecamatan','BpjsController@getKecamatan')->name('bpjs.kecamatan');

        Route::get('/bpjs/peserta','BpjsController@getPeserta')->name('bpjs.peserta');
        Route::get('/bpjs/ppkrujukan','BpjsController@getPpkRujukan')->name('bpjs.ppkrujukan');
        Route::get('/bpjs/sep','BpjsController@getSep')->name('bpjs.sep'); 
        
        // VERIFIKASI OKE BEROH
        Route::get('/viewer','KlaimBpjsController@index')->name('viewer.index');
        Route::get('/viewer/search','KlaimBpjsController@search')->name('viewer.search');
        Route::post('/viewer/verified/petugas', 'KlaimBpjsController@verified')->name('viewer.verified');


        Route::get('/verifikasi/peserta/{peserta}', 'VerifikasiController@detailPeserta')->name('detail.peserta');
        Route::get('/verifikasi/suratkontrol', 'VerifikasiController@getSuratInternal')->name('surat.kontrol');
        Route::get('/verifikasi/surat/print/{tgl}/{surat}/{rujukan}','VerifikasiController@printSurat')->name('surat.print');

        // Route::get('/page/{slug}', 'PagesController@index')->name('page.index');
        Route::put('/sep/pulang','UpdatePlgSepController@postPulang')->name('sep.pulang');
        Route::post('/sep/pulang','UpdatePlgSepController@simpanPulang')->name('sep.pulang');
        Route::get('/update/plg/sep','UpdatePlgSepController@index')->name('sep.pulang.index');
        Route::get('/update/search', 'UpdatePlgSepController@search')->name('sep.ri.search');
    });

    // Group Route Registrasi
    Route::group(['namespace' => 'Registrasi'], function() {
        Route::get('reg/rawatjalan', 'RegRawatJalanController@index')->name('reg.rj.index');
        Route::get('reg/rawatjalan/search', 'RegRawatJalanController@search')->name('reg.rj.search');
        Route::get('reg/pasien/search', 'RegRawatJalanController@searchPasien')->name('reg.pasien.search');
        Route::get('reg/pasien/kartu', 'RegRawatJalanController@getKartu')->name('reg.pasien.kartu');
        Route::post('reg/pasien/rawatjalan', 'RegRawatJalanController@sendpasien')->name('reg.pasien.rj');
    });

    // Group Route Registrasi
    Route::group(['namespace' => 'User'], function() {
        Route::get('user', 'UserController@index')->name('user.index');
        Route::get('user/pegawai/foto', 'UserController@getFoto')->name('user.foto');
        Route::get('user/pegawai/edit/{pegawai}', 'UserController@getEdit')->name('user.edit.profil');
        Route::put('user/pegawai/update/{pegawai}', 'UserController@getUpdate')->name('user.update.profil');
        Route::get('user/search', 'UserController@search')->name('user.search');
        Route::get('user/pegawai','UserController@pegawai')->name('user.pegawai');
        Route::post('user/simpan','UserController@simpanUser')->name('user.simpan');
        Route::delete('user/delete','UserController@deleteUser')->name('user.delete');
    });

    Route::group(['namespace' => 'Bed'], function(){
        Route::get('bed', 'BedController@index')->name('bed.index');
        Route::get('bed/search', 'BedController@search')->name('bed.search');
        Route::get('bed/post', 'BedController@postBed')->name('bed.post');
        Route::get('bed/update', 'BedController@updateBed')->name('bed.update');
        Route::get('bed/delete', 'BedController@deleteBed')->name('bed.delete');
    });

    Route::group(['namespace' => 'Master'], function() {
        Route::get('simrs/poli', 'PoliController@getPoli')->name('simrs.poli');
        Route::get('simrs/poli/harga', 'PoliController@getHarga')->name('simrs.poli.harga');
        Route::get('simrs/poli/dokter', 'PoliController@getDokter')->name('simrs.poli.dokter');
        Route::get('simrs/jenispasien', 'CaraBayarController@getJnsPasien')->name('simrs.carabayar');
        Route::get('simrs/jenispenjamin', 'PenjaminController@getJnsPenjamin')->name('simrs.jenispenjamin');
        Route::get('simrs/asalpasien', 'AsalPasienController@getAsalPasien')->name('simrs.asalpasien');
        Route::get('simrs/namainstansi', 'InstansiController@getNamaInstansi')->name('simrs.namainstansi');
        // Rujukan
        // Route::get('/cobatanggal', function() {
        //     $dt1 = strtotime("2018/09/20");
        //     $dt2 = strtotime("2018/12/19");
        //     $diff = abs($dt2-$dt1);
        //     $telat = $diff/86400; // 86400 detik sehari
        //     echo $telat;
        // });
    });

   

});