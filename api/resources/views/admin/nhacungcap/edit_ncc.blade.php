@extends('admin.layouts.admin')
@section('title')
<title>Chi tiết nhà cung cấp</title>
@endsection

@section('content')
<div id="showcart">

                <form action="{{ route('updateNCC',['idNhaCungCap' => $ncc->idNhaCungCap])}}" method="post">
                @csrf
                @method('PUT')
                <input type="hidden" name="editvalue">
                <input type="hidden" name="idNhaCungCap">
                    <h1>Sửa thông tin nhà cung cấp: {{$ncc->idNhaCungCap}}</h1>
                    <div class="add_info">
                        <h3>Tên nhà cung cấp</h3>
                        <input type="text" name="tenNhaCungCap" id="tenNhaCungCap" value="{{$ncc->tenNhaCungCap}}">
                    </div>
                    <div class="add_info">
                        <h3>Địa chỉ</h3>
                        <input type="text" name="diaChi" id="diaChi" value="{{$ncc->diaChi}}">
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
                        <input type="text" name="soDienThoai" id="soDienThoai" value="{{$ncc->soDienThoai}}">
                    </div>
                    <div class="add_info">
                        <h3>Email</h3>
                        <input type="text" name="email" id="email" value="{{$ncc->email}}">
                    </div>
                    <div class="btn_info">
                        <div class="btn_add">
                            <input type="submit" value="Update">
                        </div>
                        <div class="btn_exit">
                            <a href="{{Route('indexNCC')}}">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
   


@endsection