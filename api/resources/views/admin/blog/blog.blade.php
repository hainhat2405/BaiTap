@extends('admin.layouts.admin')
@section('title')
<title>Quản lý bài viết</title>
@endsection

@section('content')
<div id="quanlysp" class="tab-content-item"> 
             <h3>
                <i class="fa-solid fa-arrow-right"></i>
                Quản lý bài viết
            </h3>
            <button style="padding:10px;color: red" onclick="showcart()"><a href="{{route('add-blog')}}" style="text-decoration: none;">Thêm</a></button>
            @if(session('success'))
				<div class="alert alert-success">
					{{ session('success') }}
				</div>
			@endif
            <table class="tbl-main">
                <thead>
                <tr class="tr1">
                    <th>STT</th>
                    <th>Title</th>
                    <th>Hình ảnh</th>
                    <th>Ngày đăng</th>
                    <th>Trạng thái</th>
                    <th>Xem</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
                </thead>
                <tbody>
                @php $i = 1; @endphp
				@foreach($blog as $blog_info)
				<tr>
					<td style="height:50px">{{ $i++ }}</td>
					<td>{{ $blog_info->title }}</td>
                    <td><img src="img/{{ $blog_info->image }}" alt="" style="width:90px;"></td>
                    <td>{{ $blog_info->publish_date }}</td>
					<td><input type="checkbox" {{ $blog_info->Status ? 'checked' : '' }}></td>
                    <td><a href="{{route('show-blog',$blog_info->id)}}" class="btn btn-primary" >Chi tiết</a></td>
					<td><a href="{{route('edit-blog',$blog_info->id)}}" class="btn btn-warning">Edit</a></td>
					<td><a href="{{route('destroy-blog',$blog_info->id)}}" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa không?')">Xoá</a></td>
				</tr>
				@endforeach
                </tbody>
            </table>
            {{ $blog->links('pagination::bootstrap-4') }}
           
        </div>
@endsection