<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//admin
Route::prefix('admin')->name('admin.')->group(function(){
Route::get('/home','AdminController@index')->name('index');
Route::get('/user/list','AdminController@User_list')->name('user.list');
Route::get('/user/add','AdminController@User_tambah')->name('user.add');
Route::get('/user/edit/{id}','AdminController@User_edit')->name('user.edit');
Route::post('/user/add/store','AdminController@User_store')->name('user.add.store');
Route::post('/user/update/{id}','AdminController@User_update')->name('user.update');
Route::delete('/user/list/{id}','AdminController@destroy_user');
});

//koki
Route::prefix('koki')->name('koki.')->group(function(){
Route::get('/home','KokiController@index')->name('index');

});

//pantry
Route::prefix('pantry')->name('pantry.')->group(function(){
Route::get('/home','PantryController@index')->name('index');

});

//pelayan
Route::prefix('waitress')->name('waitress.')->group(function(){
Route::get('/home','WaitressController@index')->name('index');

});

//kasir
Route::prefix('kasir')->name('kasir.')->group(function(){
Route::get('/home','KasirController@index')->name('index');

});




?>
