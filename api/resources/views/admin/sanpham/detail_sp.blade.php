@extends('admin.layouts.admin')
@section('title')
<title>Trang chủ</title>
@endsection

@section('content')

<div id="showcart">
    

                    <h1>Chi tiết sản phẩm sản phẩm</h1>
                    <div class="add_info">
                        <h3>Tên sản phẩm</h3>
                        <input type="text" value="{{$tenSanPham}}">
                    </div>
                    <div class="add_info">
                        <h3>Tên loại sản phẩm</h3>
                        <input type="text" value="@if($idLoaiSP == 1)Bánh Hà Nội
                        @elseif($idLoaiSP == 2)Kẹo Hà Nội
                        @elseif($idLoaiSP == 3)Bánh Đậu Xanh
                        @else
                                <!-- Giá trị mặc định nếu không khớp -->
                                Không xác định
                        @endif
                        ">
                    </div>


                    <div class="add_info">
                        <h3>Status</h3>
                        <input type="text" value="{{$Status}}">
                    </div>
                    <div class="add_info">
                        <h3>Hình ảnh</h3>
                        <img src="/img/{{$hinhAnh}}" alt="">
                    </div>
                    <div class="add_info">
                        <h3>Số lượng</h3>
                        <input type="text" value="{{$soLuong}}">
                    </div>
                    <div class="add_info">
                        <h3>Giá bán</h3>
                        <input type="text" value="{{$giaBan}}">
                    </div>
                    <div class="add_info">
                        <h3>Mô tả</h3>
                        <textarea cols="95" rows="10" value="">{{$moTa}}</textarea>
                    </div>
                    <div class="cancel">
                        <a href="{{route('indexSP')}}">Cancel</a>
                    </div>
            </div>
            

@endsection