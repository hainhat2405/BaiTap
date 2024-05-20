@extends('admin.layouts.admin')
@section('title')
<title>Chi tiết nhân viên</title>
@endsection

@section('content')
<div id="showcart">

                <form action="{{ route('updateNV',['idNhanVien' => $nv->idNhanVien])}}" method="post">
                @csrf
                @method('PUT')
                <input type="hidden" name="editvalue">
                <input type="hidden" name="idNhanVien">
                    <h1>Sửa thông tin nhân viên: {{$nv->idNhanVien}}</h1>
                    <div class="add_info">
                        <h3>Tên nhân viên</h3>
                        <input type="text" name="tenNhanVien" id="tenNhanVien" value="{{$nv->tenNhanVien}}">
                    </div>
                    <div class="add_info">
                        <h3>Chức vụ</h3>
                        <input type="text" name="chucVu" id="chucVu" value="{{$nv->chucVu}}">
                    </div>
                    <div class="add_info">
                        <h3>Hình ảnh</h3>
                        <input type="file" name="hinhAnh" id="hinhAnh" value="{{$nv->hinhAnh}}">
                    </div>
                    <div class="add_info">
                        <h3>Status</h3>
                        <select name="Status" id="Status">
                            <option value="0" name="Status" id="Status">0</option>
                            <option value="1" name="Status" id="Status">1</option>
                        </select> 
                    </div>
                    <div class="add_info">
                        <h3>Địa chỉ</h3>
                        <input type="text" name="diaChi" id="diaChi" value="{{$nv->diaChi}}">
                    </select>
                    </div>
                    <div class="add_info">
                        <h3>Số điện thoại</h3>
                        <input type="text" name="soDienThoai" id="soDienThoai" value="{{$nv->soDienThoai}}">
                    </div>
                    <div class="add_info">
                        <h3>Ngày sinh</h3>
                        <input type="text" name="ngaySinh" id="ngaySinh" value="{{$nv->ngaySinh}}">
                    </div>
                    <div class="add_info">
                        <h3>Email</h3>
                        <input type="text" name="email" id="email" value="{{$nv->email}}">
                    </div>
                    <div class="btn_info">
                        <div class="btn_add">
                            <input type="submit" value="Update">
                        </div>
                        <div class="btn_exit">
                            <a href="{{Route('indexKH')}}">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
   


@endsection