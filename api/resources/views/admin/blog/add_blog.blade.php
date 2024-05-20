@extends('admin.layouts.admin')
@section('title')
<title>Thêm bài viết</title>
@endsection

@section('content')
<div id="showcart">

                <form action="{{ route('store-blog')}}" method="post">
                @csrf
                <input type="hidden" name="editvalue">
                <input type="hidden" name="idNhanVien">
                    <h1>Thêm bài viết</h1>
                    <div class="add_info">
                        <h4>Title</h4>
                        <input type="text" name="title" id="title">
                    </div>
                    <div class="add_info">
                        <h4>Status</h4>
                        <select name="Status" id="Status">
                            <option value="0" name="Status" id="Status">0</option>
                            <option value="1" name="Status" id="Status">1</option>
                        </select> 
                    </div>
                    <div class="add_info">
                        <h4>Hình ảnh</h4>
                        <input type="file" name="hinhAnh" id="hinhAnh">
                    </div>
                    
                    <div class="add_info_mota">
                        <h4>Content</h4>
                        <textarea name="content" id="content" cols="90" rows="5"></textarea>
                    </div>
                    <div class="btn_info">
                        <div class="btn_add">
                            <input type="submit" value="Thêm">
                        </div>
                        <div class="btn_exit">
                            <a href="{{Route('blog')}}">Cancel</a>
                        </div>
                    </div>
                    
                </form>
                
            </div>

@endsection