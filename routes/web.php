<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('home');



//Auth Admin Route
Route::middleware('nobackLoginMiddleware')->group(function () {

    Route::get('login-admin', 'AuthAdmin\AuthentikasiContoller@index')->name('login-admin');
    Route::post('loginPost', 'AuthAdmin\AuthentikasiContoller@loginPost')->name('post.login');
});

Route::get('logout', 'AuthAdmin\Authentikasicontoller@logout')->name('logout');

Route::namespace('AdminController')->middleware('loginMiddleware')->group(function () {

    //route Admin
    Route::get('Dashboard', 'HomeController@index')->name('Home');

    //route data admin
    //ini contoh mengkecualikan middleware atau tidak terproteksi middleware dengan mengunakan withoutmiddleware, silahkan akses Admin/view di url lalu coba tambah kan data
    Route::get('Admin/view', 'AdminController@index')->name('viewAdmin')->withoutMiddleware('loginMiddleware');
    Route::get('Admin/formSave', 'AdminController@formSave')->name('adminSave');
    Route::post('SaveAdmin', 'AdminController@actionSave')->name('actionSaveAdmin')->middleware('adminMiddleware');
    Route::get('users/{idedit}', 'AdminController@formEdit')->name('FormEdit');
    Route::post('UpdateAdmin', 'AdminController@actionUpdate')->name('actionUpdateAdmin');
    Route::get('Delete/{iddelete}', 'AdminController@actionDelete')->name('Delete');
    Route::get('datatable', 'AdminController/AdminController@datatable')->name('datatableAdmin');


    //route kategori
    Route::get('/viewKategori', 'KategoriController@index')->name('viewKategori');
    Route::get('/addKategori', 'KategoriController@formAddkategori')->name('tambahKategori');
    route::post('/aksiSimpan', 'KategoriController@saveKategori')->name('actionSaveKat');
    Route::get('/formEdit/{slug}', 'KategoriController@formUpdate')->name('formUpdate');
    Route::post('/update', 'KategoriController@actionUpdate')->name('actionUpdateKategori');
    Route::get('/delete/{idhapus}', 'KategoriController@actionDelete')->name('actionDelete');

    //route beritaa
    Route::get('/berita/view', 'BeritaController@index')->name('viewBerita');
    Route::post('/actionSave', 'BeritaController@saveBerita')->name('actionSave');
    Route::post('/tampilupdate', 'BeritaController@getOne')->name('tampilUpdate');
    Route::post('/actionUbah', 'BeritaController@updateBerita')->name('actionUpdate');
    Route::post('/aksiDelete', 'BeritaController@actionDelete')->name('aksiDelete');

    //route kirim email
    Route::get('/email', 'EmailController@index')->name('viewEmail');
    Route::post('/SendingEmail', 'EmailController@sendingEmail')->name('SendEmail');
});
