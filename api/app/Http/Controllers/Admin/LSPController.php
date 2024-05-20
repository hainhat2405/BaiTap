<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\LSPModel;
use App\Models\Admin\LoginModel;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
// session_start();
// use link;

class LSPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lsp = LSPModel::paginate(2);
        return view('admin.loaisanpham.lsp',['lsp' => $lsp]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lsp = LSPModel::all();
        return view('admin.loaisanpham.add_lsp',compact('lsp'));
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
            'idLoaiSP' => $request->input('idLoaiSP'),
            'tenLoaiSP' => $request->input('tenLoaiSP'),
            'Status' => $request->input('Status') ? 1 : 0,
            'mota' => $request->input('mota'),
        ];
        LSPModel::create($data);
        return redirect()->route('index')->with('success','Thêm thành công loại sản phẩm');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idLoaiSP)
    {
        $lsp = LSPModel::where('idLoaiSP', $idLoaiSP)->first();
        if(!$lsp){
            // xử lý khi không tìm thấy loại sản phẩm với id tương ứng
            return abort(404); // Trả về trang lỗi 404
        }
        $idLoaiSP = $lsp->idLoaiSP;
        $tenLoaiSP = $lsp->tenLoaiSP;
        $Status = $lsp->Status;
        $mota = $lsp->mota;
        return view('admin.loaisanpham.detail_lsp', compact('idLoaiSP','tenLoaiSP', 'mota', 'Status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, string $idLoaiSP)
    {
        $lsp = LSPModel::where('idLoaiSP', $idLoaiSP)->first();
        if(!$lsp){
            return abort(404);
        }
        return view('admin.loaisanpham.edit_lsp',compact('lsp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,string $idLoaiSP)
    {
        $lsp = LSPModel::find($idLoaiSP);
        if(!$lsp){
            return abort(404);
        }
        $request->validate([

        ]);
        $lsp->tenLoaiSP = $request->tenLoaiSP;
        $lsp->Status = $request->Status;
        $lsp->mota = $request->mota;
        $lsp->save();
        return redirect()->route('index',['idLoaiSP' =>$idLoaiSP])->with('success','Loại sản phẩm đã được cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $idLoaiSP)
    {
        $lsp = LSPModel::find($idLoaiSP);
        $lsp->delete();
        return redirect()->route('index')->with('success', 'Xóa thành công');
    }

    public function show_dashboard(Request $request ){
        $admin_email = $request->admin_email;
        $admin_password = $request->admin_password;
        $admin_chucvu = $request->admin_chucvu;
        

        $result = DB::table('tbl_admin')
        ->where('email',$admin_email)
        ->where('password',$admin_password)
        ->where('chucVu',$admin_chucvu)->first();
        if($result==true){
            Session::put('name',$result->name);
            Session::put('id',$result->id);
            return Redirect::to('/admin');
        }
        else{
            Session::put('message','Email hoặc password hoặc chức vụ sai');
            return Redirect::to('/login');

        }
    }
    

    // public function log_out(){
    //     return view("admin.Login_Admin");
    // }
}
