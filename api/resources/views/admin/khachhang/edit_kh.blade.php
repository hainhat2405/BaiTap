@extends('admin.layouts.admin')
@section('title')
<title>Chi tiết khách hàng</title>
@endsection

@section('content')
<div id="showcart">

                <form action="{{ route('updateKH',['idKhachHang' => $kh->idKhachHang])}}" method="post">
                @csrf
                @method('PUT')
                <input type="hidden" name="editvalue">
                <input type="hidden" name="idKhachHang">
                    <h1>Sửa thông tin khách hàng: {{$kh->idKhachHang}}</h1>
                    <div class="add_info">
                        <h3>Tên khách hàng</h3>
                        <input type="text" name="tenKhachHang" id="tenKhachHang" value="{{$kh->tenKhachHang}}">
                    </div>
                    <div class="add_info">
                        <h3>Địa chỉ</h3>
                        <input type="text" name="diaChi" id="diaChi" value="{{$kh->diaChi}}">
                    </select>
                    </div>
                    <div class="add_info">
                        <h3>Status</h3>
                        <select name="Status" id="Status">
                            <option value="0" name="Status" id="Status">0</option>
                            <option value="1" name="Status" id="Status">1</option>
                        </select> 
                    </div>
                    <div class="add_info">
                        <h3>Số điện thoại</h3>
                        <input type="text" name="soDienThoai" id="soDienThoai" value="{{$kh->soDienThoai}}">
                    </div>
                    <div class="add_info">
                        <h3>Ngày sinh</h3>
                        <input type="text" name="ngaySinh" id="ngaySinh" value="{{$kh->ngaySinh}}">
                    </div>
                    <div class="add_info">
                        <h3>Email</h3>
                        <input type="text" name="email" id="email" value="{{$kh->email}}">
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