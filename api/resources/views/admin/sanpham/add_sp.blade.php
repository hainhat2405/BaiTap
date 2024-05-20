@extends('admin.layouts.admin')
@section('title')
<title>Trang chủ</title>
@endsection

@section('content')
<div id="showcart">

                <form action="{{ route('storeSP')}}" method="post">
                @csrf
                <input type="hidden" name="editvalue">
                <input type="hidden" name="idLoaiSP">
                    <h1>Thêm sản phẩm</h1>
                    <div class="add_info">
                        <h4>Tên sản phẩm</h4>
                        <input type="text" name="tenSanPham" id="tenSanPham">
                    </div>
                    <div class="add_info">
                        <h4>Tên loại sản phẩm </h4>
                        <select name="idLoaiSP" id="idLoaiSP">
                            @foreach($lsp as $lsp)
                            <option value="{{$lsp->idLoaiSP}}" name="idLoaiSP" id="idLoaiSP">{{$lsp->tenLoaiSP}}</option>
                            @endforeach
                        </select> 
                      
                    </div>
                    <div class="add_info">
                        <h4>Status</h4>
                        <select name="Status" id="Status">
                            <option value="0" name="Status" id="Status">0</option>
                            <option value="1" name="Status" id="Status">1</option>
                        </select> 
                    </div>
                    <div class="add_info">
                        <h4>Hình ảnh</h4>
                        <input type="file" name="hinhAnh" id="hinhAnh" >
                    </div>
                    <div class="add_info">
                        <h4>Danh sách hình ảnh liên quan</h4>
                        <input type="file" name="MoreImage[]" id="MoreImage" accept="image/*" multiple>
                    </div>
                    <div class="add_info">
                        <h4>Số lượng</h4>
                        <input type="text" name="soLuong" id="soLuong">
                    </div>
                    <div class="add_info">
                        <h4>Giá bán</h4>
                        <input type="text" name="giaBan" id="giaBan">
                    </div>

                    <div class="add_info_mota">
                        <h4>Mô tả</h4>
                        <textarea name="moTa" id="moTa" cols="90" rows="5"></textarea>
                    </div>
                    <div class="btn_info">
                        <div class="btn_add">
                            <input type="submit" value="Thêm">
                        </div>
                        <div class="btn_exit">
                            <a href="{{Route('indexSP')}}">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>

@endsection