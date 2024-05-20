<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\NhanVienModel;

class NhanVienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nv= NhanVienModel::paginate(10);
        return view('admin.nhanvien.nv',compact('nv'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.nhanvien.add_NV');
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
            'idNhanVien' => $request->input('idNhanVien'),
            'tenNhanVien' => $request->input('tenNhanVien'),
            'chucVu' => $request->input('chucVu'),
            'ngaySinh' => $request->input('ngaySinh'),
            'diaChi' => $request->input('diaChi'),
            'soDienThoai' => $request->input('soDienThoai'),
            'email' => $request->input('email'),
            'Status' => $request->input('Status') ? 1 : 0,
        ];
        NhanVienModel::create($data);
        return redirect()->route('indexNV')->with('success','Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idNhanVien)
    {
        $nv = NhanVienModel::where('idNhanVien',$idNhanVien)->first();
        if(!$nv){
            return abort(404);
        }
        $idNhanVien = $nv->idNhanVien;
        $tenNhanVien = $nv->tenNhanVien;
        $chucVu = $nv->chucVu;
        $hinhAnh = $nv->hinhAnh;
        $diaChi = $nv->diaChi;
        $ngaySinh = $nv->ngaySinh;
        $email = $nv->email;
        $Status = $nv->Status;
        $soDienThoai = $nv->soDienThoai;
        return view('admin.nhanvien.detail_nv',compact('idNhanVien','tenNhanVien','soDienThoai','Status','email','ngaySinh','diaChi','hinhAnh','chucVu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,string $idNhanVien)
    {
        $nv = NhanVienModel::where('idNhanVien',$idNhanVien)->first();
        if(!$nv){
            return abort(404);
        }   
        return view('admin.nhanvien.edit_nv', compact('nv'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */    
    public function update(Request $request, string $idNhanVien)
    {
        $nv = NhanVienModel::find($idNhanVien);
        if(!$nv){
            return abort(404);
        }
        $request->validate([

        ]);
        $nv->tenNhanVien = $request->tenNhanVien;
        $nv->diaChi = $request->diaChi;
        $nv->ngaySinh = $request->ngaySinh;
        $nv->soDienThoai = $request->soDienThoai;
        $nv->email = $request->email;
        $nv->chucVu = $request->chucVu;
        $nv->Status = $request->Status ? 1 : 0;
        $nv->hinhAnh = $request->hinhAnh;
        $nv->save();
        return redirect()->route('indexNV',['idNhanVien' =>$idNhanVien])->with('success','Loại sản phẩm đã được cập nhật thành công');
    }

    
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idNhanVien)
    {
        $nv = NhanVienModel::find($idNhanVien);
        $nv->delete();
        return redirect()->route('indexNV')->with('success', 'Xóa thành công');
    }
}
