@extends('admin.layouts.admin')
@section('title')
<title>Chi tiết bài viết</title>
@endsection

@section('content')
<div id="showcart">

                <form action="{{ route('update-blog',['id' => $blog->id])}}" method="post">
                @csrf
                @method('PUT')
                <input type="hidden" name="editvalue">
                <input type="hidden" name="id">
                    <h1>Sửa thông tin bài viết: {{$blog->id}}</h1>
                    <div class="add_info">
                        <h3>Title</h3>
                        <input type="text" name="title" id="title" value="{{$blog->title}}">
                    </div>
                    <div class="add_info">
                        <h3>Hình ảnh</h3>
                        <input type="file" name="image" id="image" value="{{$blog->image}}">
                    </div>
                    <div class="add_info">
                        <h3>Status</h3>
                        <select name="Status" id="Status">
                            <option value="0" name="Status" id="Status">0</option>
                            <option value="1" name="Status" id="Status">1</option>
                        </select> 
                    </div>
                    <div class="add_info">
                        <h3>Ngày đăng</h3>
                        <input type="date" name="publish_date" id="publish_date" value="{{$blog->publish_date}}">
                    </div>
                    <div class="add_info">
                        <h3>Content</h3>
                        <textarea name="content" id="content" cols="95" rows="10" value="">{{$blog->content}}
                        </textarea>
                    </div>
                    <div class="btn_info">
                        <div class="btn_add">
                            <input type="submit" value="Update">
                        </div>
                        <div class="btn_exit">
                            <a href="{{Route('blog')}}">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
   


@endsection