<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\SanPhamModel;
use App\Models\Admin\LSPModel;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sp = SanPhamModel::paginate(5);
        return view('admin.sanpham.sp',['sp' => $sp]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lsp = LSPModel::all();
        $sp = SanPhamModel::all();
        return view('admin.sanpham.add_sp',compact('sp','lsp'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $request->validate([
        'MoreImage.*' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:5120',
    ]);

    // Handle file uploads for additional images
    $imageModels = [];
    if ($request->hasFile('MoreImage')) {
        foreach ($request->file('MoreImage') as $image) {
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $imageModels[] = ImageModel::create(['filename' => $imageName]);
        }
    }

    // Store data in the database
    $data = [
        'idSanPham' => $request->input('idSanPham'),
        'tenSanPham' => $request->input('tenSanPham'),
        'moTa' => $request->input('moTa'),
        'giaBan' => $request->input('giaBan'),
        'soLuong' => $request->input('soLuong'),
        'hinhAnh' => $request->input('hinhAnh'), // Assuming 'hinhAnh' is for the main image
        'idLoaiSP' => $request->input('idLoaiSP'),
        'Status' => $request->input('Status') ? 1 : 0,
    ];

    // Optionally, associate images with the product if applicable
    // For example, assuming SanPhamModel has a relationship method called 'images'
    $sanPham = SanPhamModel::create($data);
    $sanPham->images()->saveMany($imageModels);

    return redirect()->route('indexSP')->with('success', 'Thêm thành công loại sản phẩm');
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idSanPham)
    {
        $sp = SanPhamModel::where('idSanPham', $idSanPham)->first();
        if(!$sp){
            // xử lý khi không tìm thấy loại sản phẩm với id tương ứng
            return abort(404); // Trả về trang lỗi 404
        }
        $idSanPham = $sp->idSanPham;
        $tenSanPham = $sp->tenSanPham;
        $moTa = $sp->moTa;
        $giaBan = $sp->giaBan;
        $soLuong = $sp->soLuong;
        $hinhAnh = $sp->hinhAnh;
        $idLoaiSP = $sp->idLoaiSP;
        $Status = $sp->Status;
        return view('admin.sanpham.detail_SP', compact('idSanPham','tenSanPham', 'moTa', 'giaBan', 'soLuong', 'hinhAnh', 'idLoaiSP','Status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, string $idSanPham)
    {
        $lsp = LSPModel::all();
        $sp = SanPhamModel::where('idSanPham',$idSanPham)->first();
        if(!$sp){
            return abort(404);
        }
        return view('admin.sanpham.edit_sp',compact('sp','lsp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,string $idSanPham)
    {
        $sp = SanPhamModel::find($idSanPham);
        if(!$sp){
            return abort(404);
        }
        $request->validate([

        ]);
        $sp->tenSanPham = $request->tenSanPham;
        $sp->idLoaiSP = $request->idLoaiSP;
        $sp->giaBan = $request->giaBan;
        $sp->soLuong = $request->soLuong;
        $sp->hinhAnh = $request->hinhAnh;
        $sp->moTa = $request->moTa;
        $sp->Status = $request->Status ? 1 : 0;
        $sp->save();
        return redirect()->route('indexSP',['idSanPham' =>$idSanPham])->with('success','Sản phẩm đã được cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idSanPham)
    {
        $sp = SanPhamModel::find($idSanPham);
        $sp->delete();
        return redirect()->route('indexSP')->with('success', 'Xóa thành công');
    }

}
