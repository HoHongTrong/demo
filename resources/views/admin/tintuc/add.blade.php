@extends('admin.layout.index')

@section('content')
  <!-- Page Content -->
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">Tin Tức
            <small>Thêm</small>
          </h1>
        </div>
        <!-- /.col-lg-12 -->
        <div class="col-lg-7" style="padding-bottom:120px">

          @if(count($errors)>0)
            <div class="alert alert-danger">
              @foreach($errors->all() as $err)
                {{$err}}<br/>
              @endforeach
            </div>
          @endif

          @if(session('thongbao'))
            <div class="alert alert-success">
              {{session('thongbao')}}
            </div>
          @endif

          {{-- enctype="multipart/form-data" dùng để upload hình lên --}}
          <form action="admin/tintuc/add" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            <div class="form-group">
              <label>Thể loại :</label>
              <select class="form-control" name="TheLoai" id="TheLoai">
                @foreach($theloai as $tl)
                  <option value="{{$tl->id}}">{{$tl->Ten}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Loại tin :</label>
              <select class="form-control" name="LoaiTin" id="LoaiTin">
                @foreach($loaitin as $lti)
                  <option value="{{$lti->id}}">{{$lti->Ten}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Tiêu đề :</label>
              <input class="form-control" name="TieuDe" placeholder="Nhập tiêu đề"/>
            </div>
            <div class="form-group">
              <label>Tóm Tắt</label>
              <textarea id="demo" name="TomTat" class="form-control ckeditor" rows="2"></textarea>
            </div>

            <div class="form-group">
              <label>Nội Dung</label>
              <textarea id="demo" name="NoiDung" class="form-control ckeditor" rows="5"></textarea>
            </div>

            <div class="form-group">
              <label>Hình Ảnh</label>
              <input type="file" name="Hinh"/>

            </div>
            <div class="form-group">
              <label>Nổi Bật</label>
              <label class="radio-inline">
                <input name="NoiBat" value="0" checked="" type="radio">Không
              </label>
              <label class="radio-inline">
                <input name="NoiBat" value="1" type="radio">Có
              </label>
            </div>

            <button type="submit" class="btn btn-default">Add</button>
            <button type="reset" class="btn btn-default">Reset</button>
          </form>
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /#page-wrapper -->

@endsection
@section('script')
  <script>
    $(document).ready(function () {
      $("#TheLoai").change(function () {  /*lấy ra id của thể loại*/
        var idTheLoai = $(this).val();
        $.get("admin/ajax/loaitin/" + idTheLoai, function (data) { /*gọi trang ajax và nối id thể loại*/
          $("#LoaiTin").html(data);
          /*truyền dữ liệu sang loại tin*/
        })
      });
    })
  </script>
@endsection