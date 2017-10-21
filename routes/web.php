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
    return redirect('/login');
});
Route::group(['middleware'=>['auth']],function(){
  Route::get('/admin/{halaman}','Urlcontroller@admin');
  Route::post('/admin/projek/tambah','ProjekController@create');
  Route::get('/admin/kirteria/{id}','Urlcontroller@kriteria');//id projek
  Route::post('/admin/tambahkriteria','KriteriaController@create');
  Route::get('/admin/alternative/{id}','Urlcontroller@alternative'); //id kriteria
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
