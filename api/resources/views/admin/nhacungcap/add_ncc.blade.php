@extends('admin.layouts.admin')
@section('title')
<title>Thêm nhà cung cấp</title>
@endsection

@section('content')
<div id="showcart">

                <form action="{{ route('storeNCC')}}" method="post">
                @csrf
                <input type="hidden" name="editvalue">
                <input type="hidden" name="idNhaCungCap">
                    <h1>Thêm nhà cung cấp</h1>
                    <div class="add_info">
                        <h4>Tên nhà cung cấp</h4>
                        <input type="text" name="tenNhaCungCap" id="tenNhaCungCap">
                    </div>
                    <div class="add_info">
                        <h4>Địa chỉ</h4>
                        <input type="text" name="diaChi" id="diaChi">
                    </div>
                    <div class="add_info">
                        <h4>Status</h4>
                        <select name="Status" id="Status">
                            <option value="0" name="Status" id="Status">0</option>
                            <option value="1" name="Status" id="Status">1</option>
                        </select> 
                    </div>
                    <div class="add_info">
                        <h4>Số điện thoại</h4>
                        <input type="text" name="soDienThoai" id="soDienThoai">
                    </div>
                    <div class="add_info">
                        <h4>Email</h4>
                        <input type="email" name="email" id="email">
                    </div>
                    <div class="btn_info">
                        <div class="btn_add">
                            <input type="submit" value="Thêm">
                        </div>
                        <div class="btn_exit">
                            <a href="{{Route('indexNCC')}}">Cancel</a>
                        </div>
                    </div>
                    
                </form>
                
            </div>

@endsection