@extends('admin.layouts.admin')
@section('title')
<title>Trang chủ</title>
@endsection

@section('content')
<div id="quanlysp" class="tab-content-item"> 
             <h3>
                <i class="fa-solid fa-arrow-right"></i>
                Quản lý 
            </h3>
            <button style="padding:10px;color: red" onclick="showcart()"><a href="{{route('addNV')}}" style="text-decoration: none;">Thêm</a></button>
            @if(session('success'))
				<div class="alert alert-success">
					{{ session('success') }}
				</div>
			@endif
            <table class="tbl-main">
                <thead>
                <tr class="tr1">
                    <th>STT</th>
                    <th>Tên nhân viên</th>
                    <th>Chức vụ</th>
                    <th>Hình ảnh</th>
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
				@foreach($nv as $nv_info)
				<tr>
					<td style="height:50px">{{ $i++ }}</td>
					<td>{{ $nv_info->tenNhanVien }}</td>
					<td>{{ $nv_info->chucVu }}</td>
                    <td><img src="img/{{ $nv_info->hinhAnh }}" alt="" style="width:90px;"></td>
                    <td>{{ $nv_info->diaChi }}</td>
                    <td>{{ $nv_info->ngaySinh }}</td>
                    <td>{{ $nv_info->soDienThoai }}</td>
                    <td>{{ $nv_info->email }}</td>
					<td><input type="checkbox" {{ $nv_info->Status ? 'checked' : '' }}></td>
                    <td><a href="{{route('detailNV',$nv_info->idNhanVien)}}" class="btn btn-primary" >Chi tiết</a></td>
					<td><a href="{{route('editNV',$nv_info->idNhanVien)}}" class="btn btn-warning">Edit</a></td>
					<td><a href="{{route('destroyNV',$nv_info->idNhanVien)}}" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa không?')">Xoá</a></td>
				</tr>
				@endforeach
                </tbody>
            </table>
            {{ $nv->links('pagination::bootstrap-4') }}
           
        </div>
@endsection