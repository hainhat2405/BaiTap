<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\SanPhamModel;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facade\Redirect;

class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sp = SanPhamModel::all();
        
        return response()->json($sp);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idSanPham)
    {
        $info_kh = DB::table('tbl_customers')->orderBy('Customer_id')->get();
        // $sp = DB::table('sanpham')->where('Status', '1')->orderby('idSanPham','desc')->get();
        $lsp = DB::table('loaisanpham')->where('Status', '1')->orderby('idLoaiSP')->get();
        $detailSP = DB::table('sanpham')
            ->join('loaisanpham', 'loaisanpham.idLoaiSP' , '=' , 'sanpham.idLoaiSP' )
            ->where('sanpham.idSanPham', $idSanPham)
            ->get();
            foreach($detailSP as $key => $value){
                $idLSP = $value->idLoaiSP;
            }
            $relate_product = DB::table('sanpham')
            ->join('loaisanpham', 'loaisanpham.idLoaiSP', '=', 'sanpham.idLoaiSP')
            ->where('loaisanpham.idLoaiSP', $idLSP)->limit(3)
            ->get();
        $blog = DB::table('blog')
        ->where('Status','1')
        ->orderby('id')
        ->get();
        return view('User.sanPham',compact('lsp','detailSP','relate_product','blog','info_kh'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
