<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\TKhoanModel;

class TKhoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $acc = TKhoanModel::paginate(5);
        return view('admin.acc.acc', compact('acc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $acc = TKhoanModel::all();
        return view('admin.acc.add_acc',compact('acc'));
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
            'id' => $request->input('id'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'chucVu' => $request->input('chucVu'),
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'Status' => $request->input('Status') ? 1 : 0,
        ];
        TKhoanModel::create($data);
        return redirect()->route('Acc')->with('success','Thêm thành công loại sản phẩm');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $acc = TKhoanModel::where('id', $id)->first();
        if(!$acc){
            // xử lý khi không tìm thấy loại sản phẩm với id tương ứng
            return abort(404); // Trả về trang lỗi 404
        }
        $id = $acc->id;
        $email = $acc->email;
        $password = $acc->password;
        $chucVu = $acc->chucVu;
        $name = $acc->name;
        $phone = $acc->phone;
        $Status = $acc->Status;
        return view('admin.acc.detail_acc', compact('id','email', 'password', 'chucVu', 'name', 'phone','Status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $acc = TKhoanModel::where('id',$id)->first();
        if(!$acc){
            return abort(404);
        }
        return view('admin.acc.edit_acc',compact('acc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,string $id)
    {
        $acc = TkhoanModel::find($id);
        if(!$acc){
            return abort(404);
        }
        $request->validate([

        ]);
        $acc->email = $request->email;
        $acc->password = $request->password;
        $acc->chucVu = $request->chucVu;
        $acc->name = $request->name;
        $acc->phone = $request->phone;
        $acc->Status = $request->Status ? 1 : 0;
        $acc->save();
        return redirect()->route('Acc',['id' =>$id])->with('success','Tài khoản đã được cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $acc = TkhoanModel::find($id);
        $acc->delete();
        return redirect()->route('Acc')->with('success', 'Xóa thành công');
    }
}
