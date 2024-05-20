@extends('admin.layouts.admin')
@section('title')
<title>Trang chủ</title>
@endsection

@section('content')
<div id="showcart">

                    <h1>Thêm loại sản phẩm {{$idLoaiSP}}</h1>
                    <div class="add_info">
                        <h3>Tên loại sản phẩm</h3>
                        <input type="text" value="{{$tenLoaiSP}}">
                    </div>
                    <div class="add_info">
                        <h3>Status</h3>
                        <input type="text" value="{{$Status}}">
                    </div>
                    <div class="add_info">
                        <h3>Mô tả</h3>
                        <textarea cols="95" rows="10" value="">{{$mota}}</textarea>
                    </div>
                    <div class="cancel">
                        <a href="{{route('indexLSP')}}">Cancel</a>
                    </div>
            </div>

@endsection