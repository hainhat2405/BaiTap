<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\KhachHangModel;

class KhachHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kh = KhachHangModel::paginate(10);
        return view('admin.khachhang.kh',compact('kh'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.khachhang.add_kh');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'idKhachHang' => $request->input('idKhachHang'),
            'tenKhachHang' => $request->input('tenKhachHang'),
            'diaChi' => $request->input('diaChi'),
            'ngaySinh' => $request->input('ngaySinh'),
            'soDienThoai' => $request->input('soDienThoai'),
            'email' => $request->input('email'),
            'Status' => $request->input('Status') ? 1: 0
        ];
        KhachHangModel::create($data);
        return redirect()->route('indexKH')->with('success','Thêm thành công thông tin khách hàng');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idKhachHang)
    {
        $kh = KhachHangModel::where('idKhachHang',$idKhachHang)->first();
        if(!$kh){
            return abort(404);
        }
        $idKhachHang = $kh->idKhachHang;
        $tenKhachHang = $kh->tenKhachHang;
        $diaChi = $kh->diaChi;
        $ngaySinh = $kh->ngaySinh;
        $soDienThoai = $kh->soDienThoai;
        $email = $kh->email;
        $Status = $kh->Status;
        return view('admin.khachhang.detail_KH',compact('idKhachHang', 'tenKhachHang', 'diaChi', 'ngaySinh', 'soDienThoai', 'email', 'Status'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idKhachHang)
    {
        $kh = KhachHangModel::where('idKhachHang',$idKhachHang)->first();
        return view('admin.khachhang.edit_kh', compact('kh'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idKhachHang)
    {
        $kh = KhachHangModel::find($idKhachHang);
        if(!$kh){
            return abort(404);
        }
        $request->validate([

        ]);
        $kh->tenKhachHang = $request->tenKhachHang;
        $kh->diaChi = $request->diaChi;
        $kh->ngaySinh = $request->ngaySinh;
        $kh->soDienThoai = $request->soDienThoai;
        $kh->email = $request->email;
        $kh->Status = $request->Status ? 1 : 0;
        $kh->save();
        return redirect()->route('indexKH',['idKhachHang' =>$idKhachHang])->with('success','Thông tin khách hàng đã được cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idKhachHang)
    {
        $kh = KhachHangModel::find($idKhachHang);
        $kh->delete();
        return redirect()->route('indexKH')->with('success', 'Xóa thành công');
    }
}
