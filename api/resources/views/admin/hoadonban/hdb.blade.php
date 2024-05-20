@extends('admin.layouts.admin')
@section('title')
<title>Trang chủ</title>
@endsection

@section('content')
<div id="quanlysp" class="tab-content-item"> 
             <h3>
                <i class="fa-solid fa-arrow-right"></i>
                Quản lý hóa đơn bán
            </h3>
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
                    <th>Số điện thoại</th>
                    <th>Ngày bán</th>
                    <th>Ghi chú</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>In hóa đơn</th>
                    <th>Xem</th>
                    <th>Xóa</th>
                </tr>
                </thead>
                <tbody>
                @php $i = 1; @endphp
				@foreach($hdb as $hdb_info)
					<tr class="tr2">
						<td>{{ $i++ }}</td>
						<td>{{ $hdb_info->tenKhachHang }}</td>
						<td>{{ $hdb_info->diaChi }}</td>
						<td>{{ $hdb_info->soDienThoai }}</td>
						<td>{{ $hdb_info->ngayBan }}</td>
						<td>{{ $hdb_info->ghiChu }}</td>
						<td>{{ $hdb_info->tongTien }}</td>
						<td><input type="checkbox" {{ $hdb_info->Status ? 'checked' : '' }}></td>
                        <td><a href="{{route('print-order',$hdb_info->idHoaDonBan)}}" class="btn btn-primary" target="_blank">In</a></td>
						<td><a href="{{route('showHDB',$hdb_info->idHoaDonBan)}}" class="btn btn-warning" >Chi tiết</a></td>
						<td><a href="{{route('destroyHDB',$hdb_info->idHoaDonBan)}}" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa không?')">Xoá</a></td>
					</tr>
				@endforeach
                </tbody>
            </table>
            {{ $hdb->links('pagination::bootstrap-4') }}
           
        </div>
@endsection