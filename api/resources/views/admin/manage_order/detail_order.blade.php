@extends('admin.layouts.admin')
@section('title')
<title>Trang chủ</title>
@endsection

@section('content')
<div id="showcart">
    

                    <h1>Chi tiết thông tin đơn hàng : {{$order_byID->order_id}}</h1>
                    <h2 style="padding-left:30%;padding-top:10px">Thông tin khách hàng</h2>
                    <div class="add_info">
                        <h3>Tên khách hàng</h3>
                        <input type="text" value="{{$order_byID->Customer_name}}">
                    </div>
                    <div class="add_info">
                        <h3>Số điện thoại</h3>
                        <input type="text" value="{{$order_byID->Customer_phone}}">
                    </div>
                    <h2 style="padding-left:30%;padding-top:10px">Thông tin đơn hàng</h2>
                    
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
                        @foreach($order as $order_byID)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$order_byID->tenSanPham}}</td>
                                <td>{{$order_byID->product_sales_quantity}}</td>
                                <td>{{$order_byID->giaBan}}</td>
                                <td>{{$order_byID->product_sales_quantity * $order_byID->giaBan}}</td>
                            </tr>
                            @endforeach
                            <tr >
                                <th colspan="5">Tổng tiền: {{$order_byID->order_total . "VNĐ"}}</th>

                            </tr>
                        </tbody>
                       
                    </table>
                    
                    <div class="cancel">
                        <?php
                        if($status == 1){
                            ?>
                            <a href="{{route('viewConfirm')}}">Cancel</a>
                            <?php
                        }
                        elseif($status == 0){
                            ?>
                            <a href="{{route('manage_order')}}">Cancel</a>
                            <?php
                        }
                        elseif($status == 2){
                            ?>
                            <a href="{{route('viewUnConfirm')}}">Cancel</a>
                            <?php
                        }
                        ?>
                    </div>
            </div>

@endsection
