@extends('admin.layouts.admin')
@section('title')
<title>Chi tiết sa</title>
@endsection

@section('content')
<div id="showcart">

                <form action="{{ route('updateSP',['idSanPham' => $sp->idSanPham])}}" method="post">
                @csrf
                @method('PUT')
                <input type="hidden" name="editvalue">
                <input type="hidden" name="idSanPham">
                    <h1>Sửa Sản phẩm: {{$sp->idSanPham}}</h1>
                    <div class="add_info">
                        <h3>Tên sản phẩm</h3>
                        <input type="text" name="tenSanPham" id="tenSanPham" value="{{$sp->tenSanPham}}">
                    </div>
                    <div class="add_info">
                        <h3>Tên loại sản phẩm</h3>
                        <select name="idLoaiSP" id="idLoaiSP">
                            @foreach($lsp as $lsp)
                            <option value="{{$lsp->idLoaiSP}}" name="idLoaiSP" id="idLoaiSP">{{$lsp->tenLoaiSP}}</option>
                            @endforeach
                        </select>
                    </select>
                    </div>
                    <div class="add_info">
                        <h3>Status</h3>
                        <select name="Status" id="Status">
                            <option value="0" name="Status" id="Status">0</option>
                            <option value="1" name="Status" id="Status">1</option>
                        </select> 
                    </div>
                    <div class="add_info">
                        <h3>Hình ảnh</h3>
                        <input type="file" name="hinhAnh" id="hinhAnh" value="{{$sp->hinhAnh}}">
                    </div>
                    <div class="add_info">
                        <h3>Giá bán</h3>
                        <input type="text" name="giaBan" id="giaBan" value="{{$sp->giaBan}}">
                    </div>
                    <div class="add_info">
                        <h3>Số lượng</h3>
                        <input type="text" name="soLuong" id="soLuong" value="{{$sp->soLuong}}">
                    </div>
                    <div class="add_info">
                        <h3>Mô tả</h3>
                        <textarea name="moTa" id="moTa" cols="95" rows="10" value="">{{$sp->moTa}}
                        </textarea>
                    </div>
                    <div class="btn_info">
                        <div class="btn_add">
                            <input type="submit" value="Update">
                        </div>
                        <div class="btn_exit">
                            <a href="{{Route('indexSP')}}">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
   


@endsection