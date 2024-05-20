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
            <button style="padding:10px;color: red" onclick="showcart()"><a href="{{route('addSP')}}" style="text-decoration: none;">Thêm</a></button>
            <!-- <div id="showcart">
                <form action="{{ route('store')}}" method="post">
                @csrf
                <input type="hidden" name="editvalue">
                <input type="hidden" name="idLoaiSP">
                    <h1>Thêm loại sản phẩm</h1>
                    <div class="add_info">
                        <h3>Tên loại sản phẩm</h3>
                        <input type="text" name="tenLoaiSP" id="tenLoaiSP">
                    </div>
                    <div class="add_info">
                        <h3>Status</h3>
                        <input type="text" name="Status" id="Status">
                    </div>
                    <div class="add_info">
                        <h3>Mô tả</h3>
                        <textarea name="mota" id="mota" cols="95" rows="10"></textarea>
                    </div>
                    <div class="btn_add">
                        <input type="submit" value="Thêm">
                    </div>
                </form>
            </div> -->
            @if(session('success'))
				<div class="alert alert-success">
					{{ session('success') }}
				</div>
			@endif
            <table class="tbl-main" >
                <thead>
                <tr class="tr1">
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Giá bán</th>
                    <th>Trạng thái</th>
                    <th>Xem</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
                </thead>
                <tbody>
                @php $i = 1; @endphp
				@foreach($sp as $sp_info)
				<tr>
					<td>{{ $i++ }}</td>
					<td>{{ $sp_info->tenSanPham }}</td>
					<td><img src="img/{{ $sp_info->hinhAnh }}" alt="" style="width:90px;"></td>
                    <td>{{ $sp_info->giaBan }}</td>
					<td><input type="checkbox" {{ $sp_info->Status ? 'checked' : '' }}></td>
                    <td><a href="{{route('detailSP',$sp_info->idSanPham)}}" class="btn btn-primary" >Chi tiết</a></td>
					<td><a href="{{route('editSP',$sp_info->idSanPham)}}" class="btn btn-warning">Edit</a></td>
					<td><a href="{{route('destroySP',$sp_info->idSanPham)}}" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa không?')">Xoá</a></td>
				</tr>
				@endforeach
                </tbody>
            </table>
            {{ $sp->links('pagination::bootstrap-4') }}
           
        </div>
@endsection