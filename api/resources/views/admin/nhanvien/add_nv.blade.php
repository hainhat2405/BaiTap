@extends('admin.layouts.admin')
@section('title')
<title>Thêm nhân viên</title>
@endsection

@section('content')
<div id="showcart">

                <form action="{{ route('storeNV')}}" method="post">
                @csrf
                <input type="hidden" name="editvalue">
                <input type="hidden" name="idNhanVien">
                    <h1>Thêm nhân viên</h1>
                    <div class="add_info">
                        <h4>Tên nhân viên</h4>
                        <input type="text" name="tenNhanVien" id="tenNhanVien">
                    </div>
                    <div class="add_info">
                        <h4>Chức vụ</h4>
                        <select name="chucVu" id="chucVu">
                            <option  name="chucVu" id="chucVu">Quản lý</option>
                            <option  name="chucVu" id="chucVu">Nhân viên</option>
                        </select> 
                    </div>
                    <div class="add_info">
                        <h4>Hình ảnh</h4>
                        <input type="file" name="hinhAnh" id="hinhAnh">
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