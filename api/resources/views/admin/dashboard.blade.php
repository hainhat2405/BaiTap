@extends('admin.layouts.admin')
@section('title')
<title>Trang chủ</title>
@endsection

@section('content')
<div id="list-quanly" class="tab-content-item">
            <div class="quanly active" style="background: rgb(255, 142, 1);">
                <i class="fa-solid fa-tv"></i>
                <a href="{{route('indexSP')}}"><h3>Quản lý sản phẩm</h3></a>
            </div>
            <div class="quanly" style="background: rgb(1, 170, 177);">
                <i class="fa-sharp fa-solid fa-sun"></i>
                <a href="{{route('indexLSP')}}"><h3>Quản lý loại sản phẩm</h3></a>
            </div>
            <div class="quanly" style="background: rgb(125, 187, 0);">
                <i class="fa-solid fa-battery-full"></i>
                <a href="{{route('indexKH')}}"><h3>Quản lý khách hàng</h3></a>
            </div>
            <div class="quanly" style="background: rgb(0, 111, 203);">
                <i class="fa-solid fa-rectangle-ad"></i>
                <a href="{{route('indexNV')}}"><h3>Quản lý Nhân viên</h3></a>
            </div>
            <div class="quanly" style="background: rgb(197, 38, 32);">
                <i class="fa-regular fa-user"></i>
                <a href="{{route('indexNCC')}}"><h3>Quản lý nhà cung cấp</h3></a>   
            </div>
            <div class="quanly" style="background: rgb(1, 170, 177);">
                <i class="fa-sharp fa-solid fa-sun"></i>
                <a href="{{route('blog')}}"><h3>Quản lý bài viết</h3></a>   
            </div>
            <div class="quanly" style="background: rgb(125, 187, 0);">
                <i class="fa-solid fa-battery-full"></i>
                <a href="{{route('manage_order')}}"><h3>Quản lý đơn hàng</h3></a>   
            </div>
            <div class="quanly" style="background: rgb(0, 111, 203);">
                <i class="fa-solid fa-rectangle-ad"></i>
                <a href="{{route('impersonate-destroy')}}"><h3>Quản lý tài khoản</h3></a> 
            </div>
        </div>
        
        
@endsection