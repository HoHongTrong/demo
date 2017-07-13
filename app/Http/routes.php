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

Route::get('thu1',function (){
  $theloai = TheLoai::find(1);
  foreach ($theloai->loaitin as $loaitin){
    echo  $loaitin->ten;
  }
});
