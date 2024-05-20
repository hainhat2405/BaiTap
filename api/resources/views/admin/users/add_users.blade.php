@extends('admin.layouts.admin')
@section('title')
<title>Trang chủ</title>
@endsection

@section('content')
<div id="showcart">

                <form action="{{ route('storeAcc')}}" method="post">
                @csrf
                <input type="hidden" name="editvalue">
                <input type="hidden" name="idKhachHang">
                    <h1>Thêm tài khoản</h1>
                    <div class="add_info">
                        <h4>Name</h4>
                        <input type="text" name="name" id="name">
                    </div>
                    <div class="add_info">
                        <h4>Email</h4>
                        <input type="text" name="email" id="email">
                    </div>
                    <div class="add_info">
                        <h4>Password</h4>
                        <input type="text" name="password" id="password">
                      
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
                        <input type="text" name="phone" id="phone">
                    </div>
                    <div class="btn_info">
                        <div class="btn_add">
                            <input type="submit" value="Thêm">
                        </div>
                        <div class="btn_exit">
                            <a href="{{Route('indexUsers')}}">Cancel</a>
                        </div>
                    </div>
                    
                </form>
                
            </div>

@endsection