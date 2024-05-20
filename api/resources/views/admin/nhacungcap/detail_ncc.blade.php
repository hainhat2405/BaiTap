@extends('admin.layouts.admin')
@section('title')
<title>Chi tiết nhà cung cấp</title>
@endsection

@section('content')
<div id="showcart">
    

                    <h1>Chi tiết thông tin nhà cung cấp : {{$idNhaCungCap}}</h1>
                    <div class="add_info">
                        <h3>Tên nhà cung cấp</h3>
                        <input type="text" value="{{$tenNhaCungCap}}">
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
                        <h3>Email</h3>
                        <input type="text" value="{{$email}}">
                    </div>
                    <div class="cancel">
                        <a href="{{route('indexNCC')}}">Cancel</a>
                    </div>
            </div>

@endsection