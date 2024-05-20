@extends('admin.layouts.admin')
@section('title')
<title>Trang chủ</title>
@endsection

@section('content')
<div id="quanlysp" class="tab-content-item"> 
             <h3>
                <i class="fa-solid fa-arrow-right"></i>
                Quản lý sản phẩm
            </h3>
            <button style="padding:10px;color: red" onclick="showcart()"><a href="{{route('addAcc')}}" style="text-decoration: none;">Thêm</a></button>
            @if(session('success'))
				<div class="alert alert-success">
					{{ session('success') }}
				</div>
			@endif
            <table class="tbl-main" >
                <thead>
                <tr class="tr1">
                    <th>STT</th>
                    <th>Tên tài khoản</th>
                    <th>Mật khẩu</th>
                    <th>Chức vụ</th>
                    <th>Trạng thái</th>
                    <th>Xem</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
                </thead>
                <tbody>
                @php $i = 1; @endphp
				@foreach($acc as $acc_info)
				<tr>
					<td>{{ $i++ }}</td>
					<td>{{ $acc_info->email }}</td>
                    <td>{{ $acc_info->password }}</td>
                    <td>{{ $acc_info->chucVu }}</td>
					<td><input type="checkbox" {{ $acc_info->Status ? 'checked' : '' }}></td>
                    <td><a href="{{route('detailAcc',$acc_info->id)}}" class="btn btn-primary" >Chi tiết</a></td>
					<td><a href="{{route('editAcc',$acc_info->id)}}" class="btn btn-warning">Edit</a></td>
					<td><a href="{{route('destroyAcc',$acc_info->id)}}" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa không?')">Xoá</a></td>
				</tr>
				@endforeach
                </tbody>
            </table>
            {{ $acc->links('pagination::bootstrap-4') }}
           
        </div>
@endsection