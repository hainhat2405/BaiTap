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
            <button style="padding:10px;color: red" onclick="showcart()"><a href="{{route('addKH')}}" style="text-decoration: none;">Thêm</a></button>
            @if(session('success'))
				<div class="alert alert-success">
					{{ session('success') }}
				</div>
			@endif
            <table class="tbl-main">
                <thead>
                <tr class="tr1">
                    <th>STT</th>
                    <th>Tên khách hàng</th>
                    <th>Địa chỉ</th>
                    <th>Ngày sinh</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Trạng thái</th>
                    <th>Xem</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
                </thead>
                <tbody>
                @php $i = 1; @endphp
				@foreach($kh as $kh_info)
				<tr class="tr2">
					<td>{{ $i++ }}</td>
					<td>{{ $kh_info->tenKhachHang }}</td>
                    <td>{{ $kh_info->diaChi }}</td>
                    <td>{{ $kh_info->ngaySinh }}</td>
                    <td>{{ $kh_info->soDienThoai }}</td>
                    <td>{{ $kh_info->email }}</td>
					<td><input type="checkbox" {{ $kh_info->Status ? 'checked' : '' }}></td>
                    <td><a href="{{route('detailKH',$kh_info->idKhachHang)}}" class="btn btn-primary" >Chi tiết</a></td>
					<td><a href="{{route('editKH',$kh_info->idKhachHang)}}" class="btn btn-warning">Edit</a></td>
					<td><a href="{{route('destroyKH',$kh_info->idKhachHang)}}" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa không?')">Xoá</a></td>
				</tr>
				@endforeach
                </tbody>
            </table>
            {{ $kh->links('pagination::bootstrap-4') }}
           
        </div>
@endsection