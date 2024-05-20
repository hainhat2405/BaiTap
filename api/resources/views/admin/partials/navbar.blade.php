<div id="page1">
        <div class="func">
            <a href="{{route('admin')}}"><label for="toggle_sidebar0">Trang chủ</label></a>
            <a href="{{route('indexSP')}}"><label for="toggle_sidebar0">Sản phẩm</label></a>
            <a href="{{route('indexLSP')}}"><label for="toggle_sidebar0">Loại sản phẩm</label></a>
            <a href="{{route('indexKH')}}"><label for="toggle_sidebar0">Khách hàng</label></a>   
            <a href="{{route('indexNV')}}"><label for="toggle_sidebar0">Nhân viên</label></a>   
            <a href="{{route('indexNCC')}}"><label for="toggle_sidebar0">Nhà cung cấp</label></a>   
            <a href="{{route('blog')}}"><label for="toggle_sidebar0">Bài viết</label></a>   
            <a href="{{route('manage_order')}}"><label for="toggle_sidebar0">Đơn hàng</label></a>
            <a href="{{route('indexHDB')}}"><label for="toggle_sidebar0">Hóa Đơn Bán</label></a>
            @impersonate()
            <a href="{{route('impersonate-destroy')}}"><label for="toggle_sidebar0">Chuyển quyền</label></a>
            @endimpersonate
            @hasrole(['author', 'admin'])
                <a href="{{ route('indexUsers') }}">
                    <label for="toggle_sidebar0">Tài khoản</label>
                </a>
            @endhasrole

        </div>
    </div>