@extends('admin.layouts.admin')
@section('title')
<title>Trang chủ</title>
@endsection

@section('content')
<div id="showcart">

                <form action="{{ route('storeKH')}}" method="post">
                @csrf
                <input type="hidden" name="editvalue">
                <input type="hidden" name="idKhachHang">
                    <h1>Thêm khách hàng</h1>
                    <div class="add_info">
                        <h4>Tên khách hàng</h4>
                        <input type="text" name="tenKhachHang" id="tenKhachHang">
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
                        <h4>Ngày sinh</h4>
                        <input type="date" name="ngaySinh" id="ngaySinh">
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
                            <a href="{{Route('indexKH')}}">Cancel</a>
                        </div>
                    </div>
                    
                </form>
                
            </div>

@endsection