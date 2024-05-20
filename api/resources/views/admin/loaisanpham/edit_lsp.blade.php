@extends('admin.layouts.admin')
@section('title')
<title>Trang chủ</title>
@endsection

@section('content')
<a href="{{route('indexLSP')}}">Cancel</a>
<div id="showcart">

                <form action="{{ route('update',['idLoaiSP' => $lsp->idLoaiSP])}}" method="post">
                @csrf
                @method('PUT')
                <input type="hidden" name="editvalue">
                <input type="hidden" name="idLoaiSP">
                    <h1>Loại sản phẩm: {{$lsp->idLoaiSP}}</h1>
                    <div class="add_info">
                        <h3>Tên loại sản phẩm</h3>
                        <input type="text" name="tenLoaiSP" id="tenLoaiSP" value="{{$lsp->tenLoaiSP}}">
                    </div>
                    <div class="add_info">
                        <h3>Status</h3>
                        <input type="text" name="Status" id="Status" value="{{$lsp->Status}}">
                    </div>
                    <div class="add_info">
                        <h3>Mô tả</h3>
                        <textarea name="mota" id="mota" cols="95" rows="10" value="">{{$lsp->mota}}
                        </textarea>
                    </div>
                    <div class="btn_info">
                        <div class="btn_add">
                            <input type="submit" value="Update">
                        </div>
                        <div class="btn_exit">
                            <a href="{{Route('indexLSP')}}">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
   


@endsection