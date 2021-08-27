<?php
use App\Http\Controllers\PagesController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'DashboardController@index');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::prefix('MasterRole')->namespace('masterRole')->name('MasterRole.')->group(function(){
    //role
    Route::get('addpermission/{id}', 'RoleController@permission')->name('role.addpermission');
    Route::post('storePermission', 'RoleController@storePermission')->name('storePermissions');

    Route::post('role/api', 'RoleController@api')->name('role.api');
    Route::get('getPermission/{id}', 'RoleController@getPermission')->name('getPermissions');
    Route::delete('destroyPermission/{name}', 'RoleController@destroyPermission')->name('destroyPermission');
    Route::resource('role', 'RoleController');


    //permissions
    Route::resource('permissions', 'PermissionsController');
    Route::post('permissions/api', 'PermissionsController@api')->name('permissions.api');

    //pengguna
    Route::resource('pengguna', 'PenggunaController');
    Route::post('pengguna/api', 'PenggunaController@api')->name('pengguna.api');
    Route::get('{id}/editPassword', 'PenggunaController@editPassword')->name('editPassword');
    Route::post('{id}/updatePassword', 'PenggunaController@updatePassword')->name('updatePassword');
});

Route::prefix('Perusahaan')->namespace('perusahaan')->name('Perusahaan.')->group(function(){
    // customer
    Route::resource('customer', 'CustomerController');
    Route::post('customer/api', 'CustomerController@api')->name('customer.api');
    Route::get('kabupatenByProvinsi/{id}', 'CustomerController@kabupatenByProvinsi')->name('kabupatenByProvinsi');
    Route::get('kecamatanByKabupaten/{id}', 'CustomerController@kecamatanByKabupaten')->name('kecamatanByKabupaten');
    Route::get('kelurahanByKecamatan/{id}', 'CustomerController@kelurahanByKecamatan')->name('kelurahanByKecamatan');

    // jenis_barang
    Route::resource('Jenis_Barang', 'JenisBarangController');
    Route::post('Jenis_Barang/api', 'JenisBarangController@api')->name('Jenis_Barang.api');

    // Pesanan
    Route::resource('Pesanan', 'PesananController');
    Route::get('Pesanan/dataBarang/{id}', 'PesananController@dataBarang')->name('Pesanan.dataBarang');
    Route::post('Pesanan/api', 'PesananController@api')->name('Pesanan.api');
    Route::get('pdf', 'PesananController@pdf')->name('Pesanan.pdf');
    Route::get('cetak_pdf/{id}', 'PesananController@cetak_pdf')->name('Pesanan.cetak_pdf');


});




