@extends('admin.layouts.admin')
@section('title')
<title>Quản lý đơn hàng</title>
@endsection

@section('content')
<div id="quanlysp" class="tab-content-item"> 
             <h3>
                <i class="fa-solid fa-arrow-right"></i>
                Quản lý đơn hàng: Đã xác nhận
            </h3>
            <button style="padding:10px;color: red" onclick="showcart()"><a href="{{route('manage_order')}}" style="text-decoration: none;">Chờ xử lý</a></button>
            <button style="padding:10px;color: red" onclick="showcart()"><a href="{{route('viewUnConfirm')}}" style="text-decoration: none;">Đã hủy</a></button>
            @if(session('success'))
				<div class="alert alert-success">
					{{ session('success') }}
				</div>
			@endif
            
            <table class="tbl-main">
                <thead>
                <tr class="tr1">
                    <th>STT</th>
                    <th>Tên người đặt</th>
                    <th>Tổng giá tiền</th>
                    <th>Trạng thái</th>
                    <th>Xem</th>
                </tr>
                </thead>
                <tbody>
                @php $i = 1; @endphp
				@foreach($all_order as $order_info)
                    <?php
                        if($order_info->order_status == 1){
                            ?>
                            <tr>
                    <td>{{$i++}}</td>
                    <td>{{ $order_info->Customer_name}}</td>
                    <td>{{ $order_info->order_total }}</td>
					<td>
                        <?php
                            if($order_info -> order_status == 1){
                                ?>
                                <button class="btn btn-success">
                                    Đã xác nhận  
                                 </button>

                                <?php
                            }
                        ?>
                    
                    </td>
                    <td><a href="{{route('view-order',$order_info->order_id)}}" class="btn btn-primary" >Chi tiết</a></td>
					
				</tr>

                            <?php
                        }
                    ?>
				@endforeach
                </tbody>
            </table>
           
        </div>
@endsection