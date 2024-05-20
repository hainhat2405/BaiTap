@extends('admin.layouts.admin')
@section('title')
<title>Nhà cung cấp</title>
@endsection

@section('content')
<div id="quanlysp" class="tab-content-item"> 
             <h3>
                <i class="fa-solid fa-arrow-right"></i>
                Quản lý nhà cung cấp
            </h3>
            <button style="padding:10px;color: red" onclick="showcart()"><a href="{{route('addNCC')}}" style="text-decoration: none;">Thêm</a></button>
            @if(session('success'))
				<div class="alert alert-success">
					{{ session('success') }}
				</div>
			@endif
            <table class="tbl-main">
                <thead>
                <tr class="tr1">
                    <th>STT</th>
                    <th>Tên nhà cung cấp</th>
                    <th>Địa chỉ</th>
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
				@foreach($ncc as $ncc_info)
				<tr>
					<td style="height:50px">{{ $i++ }}</td>
					<td>{{ $ncc_info->tenNhaCungCap }}</td>
                    <td>{{ $ncc_info->diaChi }}</td>
                    <td>{{ $ncc_info->soDienThoai }}</td>
                    <td>{{ $ncc_info->email }}</td>
					<td><input type="checkbox" {{ $ncc_info->Status ? 'checked' : '' }}></td>
                    <td><a href="{{route('detailNCC',$ncc_info->idNhaCungCap)}}" class="btn btn-primary" >Chi tiết</a></td>
					<td><a href="{{route('editNCC',$ncc_info->idNhaCungCap)}}" class="btn btn-warning">Edit</a></td>
					<td><a href="{{route('destroyNCC',$ncc_info->idNhaCungCap)}}" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa không?')">Xoá</a></td>
				</tr>
				@endforeach
                </tbody>
            </table>
            {{ $ncc->links('pagination::bootstrap-4') }}
           
        </div>
@endsection