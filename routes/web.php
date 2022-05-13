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

Route::get('/', function () {
    return view('welcome');
});

Route::get('password', function () {
    return Hash::make('admin');
});

Route::get('dashboard_admin','ChartController@dashboard', function () {
	return view('dashboard_admin_new');
});

Route::get('dashboard_user','GraphController@dashboard_user', function() {
	return view('dashboard_user')->withMessage('Berhasil tambah data');
});
Route::post('add_data','LoginController@add_data', function(){
    return back();
})->name('add_data');
// LoginController@nama_function
Route::get('login_admin','LoginController@index');
Route::get('register_admin','LoginController@index_register');
Route::post('login_action','LoginController@login_action')->name('login_action');
Route::post('register_action','LoginController@register_action')->name('register_action');
// LoginuserController@nama_function
Route::get('login_user','LoginuserController@index_user');
Route::get('register_user','LoginuserController@register_user');
Route::post('loginuser_action','LoginuserController@loginuser_action')->name('loginuser_action');
Route::post('registeruser_action','LoginuserController@registeruser_action')->name('registeruser_action');
route::get('user.index_user','LoginuserController@user_pegawai');
route::get('logout','LoginuserController@logout')->name('logout');

// buat admin
Route::get('logout_user','LoginController@logout_user')->name('logout_user');
 
// buat resource
Route::resource('user_new','UserNewController');
Route::resource('pegawai_new','PegawaiController');

Route::get('profile','LoginController@profile')->name('profile');
Route::get('input_pegawai','LoginController@input_user');
Route::post('input_action','LoginController@input_action')->name('input_action');
Route::get('sendmail','LoginController@mail');
Route::get('kirimpesan','UserNewController@val_mail');
// Buat USER

 
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
