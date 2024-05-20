@extends('admin.layouts.admin')
@section('title')
<title>Chi tiết tài khoản</title>
@endsection

@section('content')
<div id="showcart">

                <form action="{{ route('updateAcc',['id' => $acc->id])}}" method="post">
                @csrf
                @method('PUT')
                <input type="hidden" name="editvalue">
                <input type="hidden" name="id">
                    <h1>Sửa tài khoản: {{$acc->id}}</h1>
                    <div class="add_info">
                        <h3>Email</h3>
                        <input type="text" name="email" id="email" value="{{$acc->email}}">
                    </div>
                    <div class="add_info">
                        <h3>Password</h3>
                        <input type="text" name="password" id="password" value="{{$acc->password}}">
                    </div>
                    <div class="add_info">
                        <h3>Chức vụ</h3>
                        <select name="chucVu" id="chucVu">
                            <option value="quản lý" name="chucVu" id="chucVu">Quản lý</option>
                            <option value="nhân viên" name="chucVu" id="chucVu">Nhân viên</option>
                        </select> 
                    </div>
                    <div class="add_info">
                        <h3>Status</h3>
                        <select name="Status" id="Status">
                            <option value="0" name="Status" id="Status">0</option>
                            <option value="1" name="Status" id="Status">1</option>
                        </select> 
                    </div>
                    <div class="add_info">
                        <h3>Name</h3>
                        <input type="text" name="name" id="name" value="{{$acc->name}}">
                    </div>
                    <div class="add_info">
                        <h3>Phone</h3>
                        <input type="text" name="phone" id="phone" value="{{$acc->phone}}">
                    </div>
                    <div class="btn_info">
                        <div class="btn_add">
                            <input type="submit" value="Update">
                        </div>
                        <div class="btn_exit">
                            <a href="{{Route('Acc')}}">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
   


@endsection