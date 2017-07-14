<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\TheLoai;
Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'admin'],function (){

  Route::group(['prefix'=>'theloai'],function (){
    Route::get('list','TheLoaiController@getList');

    Route::get('edit/{id}','TheLoaiController@getEdit');
    Route::post('edit/{id}','TheLoaiController@postEdit');

    Route::get('add','TheLoaiController@getAdd');
    Route::post('add','TheLoaiController@postAdd');

    Route::get('delete/{id}','TheLoaiController@getDelete');
  });

  Route::group(['prefix'=>'loaitin'],function (){
    Route::get('list','LoaiTinController@getList');

    Route::get('edit/{id}','LoaiTinController@getEdit');
    Route::post('edit/{id}','LoaiTinController@postEdit');

    Route::get('add','LoaiTinController@getAdd');
    Route::post('add','LoaiTinController@postAdd');

    Route::get('delete/{id}','LoaiTinController@getDelete');
  });

  Route::group(['prefix'=>'tintuc'],function (){
    Route::get('list','TinTucController@getList');

    Route::get('edit','TinTucController@getEdit');

    Route::get('add','TinTucController@getAdd');
  });

  Route::group(['prefix'=>'slide'],function (){
    Route::get('list','SlideController@getList');

    Route::get('edit','SlideController@getEdit');

    Route::get('add','SlideController@getAdd');
  });

  Route::group(['prefix'=>'user'],function (){
    Route::get('list','UserController@getList');

    Route::get('edit','UserController@getEdit');

    Route::get('add','UserController@getAdd');
  });

});
