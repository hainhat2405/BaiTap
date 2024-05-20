@extends('admin.layouts.admin')
@section('title')
<title>Trang chủ</title>
@endsection

@section('content')

<div id="showcart">
    

                    <h1>Chi tiết tài khoản</h1>
                    <div class="add_info">
                        <h3>Email</h3>
                        <input type="text" value="{{$email}}">
                    </div>
                    <div class="add_info">
                        <h3>Password</h3>
                        <input type="text" value="{{$password}}">
                    </div>
                    <div class="add_info">
                        <h3>Chức vụ</h3>
                        <input type="text" value="{{$chucVu}}">
                    </div>
                    <div class="add_info">
                        <h3>Status</h3>
                        <input type="text" value="{{$Status}}">
                    </div>
                    <div class="add_info">
                        <h3>Name</h3>
                        <input type="text" value="{{$name}}">
                    </div>
                    <div class="add_info">
                        <h3>Phone</h3>
                        <input type="text" value="{{$phone}}">
                    </div>
                    <div class="cancel">
                        <a href="{{route('Acc')}}">Cancel</a>
                    </div>
            </div>
            

@endsection