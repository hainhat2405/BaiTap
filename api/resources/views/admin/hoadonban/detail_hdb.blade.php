@extends('admin.layouts.admin')
@section('title')
<title>Trang chủ</title>
@endsection

@section('content')
<div id="showcart">
                    <h1>Chi tiết hóa đơn bán: {{$idHoaDonBan}}</h1>
                    <div class="add_info">
                        <h3>Tên khách hàng</h3>
                        <input type="text" value="{{$tenKhachHang}}">
                    </div>
                    <div class="add_info">
                        <h3>Địa chỉ</h3>
                        <input type="text" value="{{$diaChi}}">
                    </div>
                    <div class="add_info">
                        <h3>soDienThoai</h3>
                        <input type="text" value="{{$soDienThoai}}">
                    </div>
                    <div class="add_info">
                        <h3>Ngày Bán</h3>
                        <input type="text" value="{{$ngayBan}}">
                    </div>
                    <div class="add_info">
                        <h3>Tổng tiền</h3>
                        <input type="text" value="{{$tongTien}}">
                    </div>
                    <div class="add_info">
                        <h3>Status</h3>
                        <input type="text" value="{{$Status}}">
                    </div>
                    <div class="add_info">
                        <h3>Ghi chú</h3>
                        <textarea cols="90" rows="0" value="">{{$ghiChu}}</textarea>
                    </div>
                    <table class="tbl-main">
                        <thead>
                            <tr class="tr1">
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Giá bán</th>
                                <th>Tổng tiền</th>

                            </tr>
                        </thead>
                        @php $i = 1; @endphp
                        
                        <tbody>
                        @foreach($all_cthdb as $ct)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$ct->tenSanPham}}</td>
                                <td>{{$ct->soLuong}}</td>
                                <td>{{$ct->giaBan}}</td>
                                <td>{{$ct->soLuong * $ct->giaBan}}</td>
                            </tr>
                            @endforeach
                            <tr >
                                <th colspan="5">Tổng tiền: {{$ct->tongTien}}</th>

                            </tr>
                        </tbody>
                       
                    </table>
                    <div class="cancel">
                        <a href="{{route('indexHDB')}}">Cancel</a>
                    </div>
            </div>

@endsection