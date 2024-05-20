@extends('admin.layouts.admin')
@section('title')
<title>Quản lý đơn hàng</title>
@endsection

@section('content')
<div id="quanlysp" class="tab-content-item"> 
             <h3>
                <i class="fa-solid fa-arrow-right"></i>
                Quản lý đơn hàng: Chờ xử lý
            </h3>
            <button style="padding:10px;color: red" onclick="showcart()"><a href="{{route('viewConfirm')}}" style="text-decoration: none;">Đã xác nhận</a></button>
            <button style="padding:10px;color: red" onclick="showcart()"><a href="{{route('viewUnConfirm')}}" style="text-decoration: none;">Đã hủy</a></button>
            <!-- @if(session('success'))
				<div class="alert alert-success">
					{{ session('success') }}
				</div>
			@endif -->
            <table class="tbl-main">
                <thead>
                <tr class="tr1">
                    <th>STT</th>
                    <th>Tên người đặt</th>
                    <th>Tổng giá tiền</th>
                    <th>Trạng thái</th>
                    <th>Chức năng</th>
                    <th>Xem</th>
                </tr>
                </thead>
                <tbody>
                @php $i = 1; @endphp
				@foreach($all_order as $order_info)
                    <?php
                        if($order_info->order_status == 0){
                            ?>
                            <tr>
                    <td>{{$i++}}</td>
                    <td>{{ $order_info->Customer_name}}</td>
                    <td>{{ $order_info->order_total }}</td>
					<td>
                        <?php
                            if($order_info -> order_status == 0){
                                ?>
                               
                                    Chờ xử lý   

                                <?php
                            }
                        ?>
                    
                    </td>
					<td>
                    <form action="{{ route('confirm-order',$order_info->order_id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="order_id" value="{{ $order_info->order_id }}">
                        <button type="submit" class="btn btn-primary">Xác nhận đơn hàng</button>
                    </form>
                    </td>
                    <td><a href="{{route('view-order',$order_info->order_id)}}" class="btn btn-warning" >Chi tiết</a></td>
					
				</tr>

                            <?php
                        }
                    ?>
				@endforeach
                </tbody>
            </table>
            <!-- {{ $order->links('pagination::bootstrap-4') }} -->
           
        </div>
@endsection