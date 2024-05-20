<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\NhaCungCapModel;

class NhaCungCapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ncc = NhaCungCapModel::paginate(3);
        return view('admin.nhacungcap.ncc',compact('ncc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.nhacungcap.add_ncc');
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
            'idNhaCungCap' => $request->input('idNhaCungCap'),
            'tenNhaCungCap' => $request->input('tenNhaCungCap'),
            'soDienThoai' => $request->input('soDienThoai'),
            'diaChi' => $request->input('diaChi'),
            'email' => $request->input('email'),
            'Status' => $request->input('Status') ? 1: 0,
        ];
        NhaCungCapModel::create($data);
        return redirect()->route('indexNCC')->with('success', 'Thêm thông tin nhà cung cấp thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idNhaCungCap)
    {
        $ncc = NhaCungCapModel::where('idNhaCungCap',$idNhaCungCap)->first();
        if(!$ncc){
            return abort();
        }
        $idNhaCungCap = $ncc->idNhaCungCap;
        $tenNhaCungCap = $ncc->tenNhaCungCap;
        $diaChi = $ncc->diaChi;
        $soDienThoai = $ncc->soDienThoai;
        $email = $ncc->email;
        $Status = $ncc->Status;
        return view('admin.nhacungcap.detail_ncc',compact('idNhaCungCap','tenNhaCungCap', 'soDienThoai', 'diaChi', 'email', 'Status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idNhaCungCap)
    {
        $ncc = NhaCungCapModel::where('idNhaCungCap', $idNhaCungCap)->first();
        if(!$ncc){
            return abort(404);
        }
        return view('admin.nhacungcap.edit_ncc', compact('ncc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idNhaCungCap)
    {
        $ncc = NhaCungCapModel::find($idNhaCungCap);
        if(!$idNhaCungCap){
            return abort(404);
        }
        $ncc->tenNhaCungCap = $request->tenNhaCungCap;
        $ncc->diaChi = $request->diaChi;
        $ncc->soDienThoai = $request->soDienThoai;
        $ncc->email = $request->email;
        $ncc->Status = $request->Status ? 1:0;
        $ncc->save();
        return redirect()->route('indexNCC',['idNhaCungCap'=>$idNhaCungCap])->with('success', 'Sửa thông tin nhà cung cấp');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idNhaCungCap)
    {
        $ncc = NhaCungCapModel::find($idNhaCungCap);
        $ncc->delete();
        return redirect()->route('indexNCC')->with('success','Xóa thành công');
    }
}
