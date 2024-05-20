@extends('admin.layouts.admin')
@section('title')
<title>Chi tiết bài viết</title>
@endsection

@section('content')
<div id="showcart">
    

                    <h1>Chi tiết thông tin nhân viên : {{$id}}</h1>
                    <div class="add_info">
                        <h3>Title</h3>
                        <input type="text" value="{{$title}}">
                    </div>
                    <div class="add_info">
                        <h3>Hình ảnh</h3>
                        <img src="/img/{{$image}}" alt="">
                    </div>
                    <div class="add_info">
                        <h3>Status</h3>
                        <input type="text" value="{{$Status}}">
                    </div>
                    <div class="add_info">
                        <h3>Ngày đăng</h3>
                        <input type="date" value="{{$publish_date}}">
                    </div>
                    <div class="add_info_mota">
                        <h4>Content</h4>
                        <textarea cols="90" rows="5">{{$content}}</textarea>
                    </div>
                    <div class="cancel">
                        <a href="{{route('blog')}}">Cancel</a>
                    </div>
            </div>

@endsection