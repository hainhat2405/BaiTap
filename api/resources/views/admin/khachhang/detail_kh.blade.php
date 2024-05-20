@extends('admin.layouts.admin')
@section('title')
<title>Trang chủ</title>
@endsection

@section('content')
<div id="showcart">
    

                    <h1>Chi tiết thông tin khách hàng</h1>
                    <div class="add_info">
                        <h3>Tên khách hàng</h3>
                        <input type="text" value="{{$tenKhachHang}}">
                    </div>
                    <div class="add_info">
                        <h3>Địa chỉ</h3>
                        <input type="text" value="{{$diaChi}}">
                    </div>
                    <div class="add_info">
                        <h3>Status</h3>
                        <input type="text" value="{{$Status}}">
                    </div>
                    <div class="add_info">
                        <h3>Số điện thoại</h3>
                        <input type="text" value="{{$soDienThoai}}">
                    </div>
                    <div class="add_info">
                        <h3>Ngày sinh</h3>
                        <input type="text" value="{{$ngaySinh}}">
                    </div>
                    <div class="add_info">
                        <h3>Email</h3>
                        <input type="text" value="{{$email}}">
                    </div>
                    <div class="cancel">
                        <a href="{{route('indexKH')}}">Cancel</a>
                    </div>
            </div>

@endsection