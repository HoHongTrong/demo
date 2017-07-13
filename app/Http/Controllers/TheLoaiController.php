<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\TheLoai;
class TheLoaiController extends Controller {
  public function getList() {
    $theloai = TheLoai::all();
    return view('admin.theloai.list',['theloai'=>$theloai]);
  }

  public function getEdit() {

  }

  public function getAdd() {

  }
}
