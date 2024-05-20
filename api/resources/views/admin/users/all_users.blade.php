@extends('admin.layouts.admin')
@section('title')
<title>Trang chủ</title>
@endsection

@section('content')
<div id="quanlysp" class="tab-content-item"> 
             <h3>
                <i class="fa-solid fa-arrow-right"></i>
                Quản lý khách hàng
            </h3>
            <button style="padding:10px;color: red" onclick="showcart()"><a href="{{route('addAcc')}}" style="text-decoration: none;">Thêm</a></button>
            @if(session('message'))
				<div class="alert alert-success">
					{{ session('message') }}
				</div>
			@endif
            <table class="tbl-main">
                <thead>
                <tr class="tr1">
                    <th>STT</th>
                    <th>Tên user</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Số điện thoại</th>
                    <th>Author</th>
                    <th>Admin</th>
                    <th>User</th>
                    <th>Xem</th>
                    <th>Xóa</th>
                    <th>Chuyển Acc</th>
                </tr>
                </thead>
                <tbody>
                @php $i = 1; @endphp
				@foreach($admin as $admin_info)
				<form action="{{URL::to('/assign_roles')}}" method="post">
                    @csrf
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $admin_info->name }}</td>
                        <td>
                            {{ $admin_info->email }}
                            <input type="hidden" name="email" value="{{$admin_info->email}}">
                            <input type="hidden" name="id" value="{{$admin_info->id}}">
                        </td>
                        <td>{{ $admin_info->password }}</td>
                        <td>{{ $admin_info->phone }}</td>
                        <td><input type="checkbox" name="author_role" {{ $admin_info->hasRole('author') ? 'checked' : '' }}></td>
                        <td><input type="checkbox" name="admin_role" {{ $admin_info->hasRole('admin') ? 'checked' : '' }}></td>
                        <td><input type="checkbox" name="user_role" {{ $admin_info->hasRole('user') ? 'checked' : '' }}></td>
                        <td>
                            <input type="submit" value="Phân quyền">
                        </td>
                        <td><a href="{{URL::to('/delete-user-roles/'.$admin_info->id)}}" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa không?')">Xoá</a></td>
                        <td><a href="{{URL::to('/impersonate/'.$admin_info->id)}}" class="btn btn-success" onclick="return confirm('Bạn có muốn xóa không?')">Chuyển</a></td>
                    </tr>
                </form>
				@endforeach
                </tbody>
            </table>
            {{ $admin->links('pagination::bootstrap-4') }}
           
        </div>
@endsection