<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\SalesInvoice;
use App\Models\Admin\SalesInvoiceDetail;
use DB;


class HoaDonBanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hdb = SalesInvoice::paginate(5);
        return view('admin.hoadonban.hdb',compact('hdb'));
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
    public function show($idHoaDonBan)
    {
        $hdb = SalesInvoice::where('idHoaDonBan', $idHoaDonBan)->first();
        if(!$hdb){
            // xử lý khi không tìm thấy loại sản phẩm với id tương ứng
            return abort(404); // Trả về trang lỗi 404
        }
        $idHoaDonBan = $hdb->idHoaDonBan;
        $tenKhachHang = $hdb->tenKhachHang;
        $diaChi = $hdb->diaChi;
        $soDienThoai = $hdb->soDienThoai;
        $ngayBan = $hdb->ngayBan;
        $ghiChu = $hdb->ghiChu;
        $tongTien = $hdb->tongTien;
        $Status = $hdb->Status;

        $all_cthdb = DB::table('cthoadonban')
            ->join('hoadonban', 'cthoadonban.idHoaDonBan', '=', 'hoadonban.idHoaDonBan')
            ->where('cthoadonban.idHoaDonBan', $idHoaDonBan)
            ->select('hoadonban.*', 'cthoadonban.*') // Thêm 'hoadonban.tenLoaiSP' vào select
            ->get();
        // $all_cthdb = DB::table('cthoadonban')
        // ->join('hoadonban','cthoadonban.idHoaDonBan', '=', 'hoadonban.idHoaDonBan')
        // ->select('cthoadonban.*', 'hoadonban.*')
        // ->orderby('cthoadonban.idHoaDonBan')->get();
        return view('admin.hoadonban.detail_hdb', compact('idHoaDonBan','tenKhachHang', 'diaChi','soDienThoai','ngayBan','tongTien','ghiChu', 'Status','all_cthdb'));
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
    public function destroy($idHoaDonBan)
    {
        // Xóa SalesInvoiceDetail trước
        SalesInvoiceDetail::where('idHoaDonBan', $idHoaDonBan)->delete();
    
        // Sau đó xóa SalesInvoice
        $hdb = SalesInvoice::find($idHoaDonBan);
        $hdb->delete();
        
        return redirect()->route('indexHDB')->with('success', 'Xóa thành công');
    }
    
    
    public function print_order($idHoaDonBan){
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert($idHoaDonBan));
        return $pdf->stream();
    }

    public function print_order_convert($idHoaDonBan){
        $hdb = SalesInvoice::find($idHoaDonBan);
        $all_cthdb = DB::table('cthoadonban')
        ->join('hoadonban', 'cthoadonban.idHoaDonBan', '=', 'hoadonban.idHoaDonBan')
        ->where('cthoadonban.idHoaDonBan', $idHoaDonBan)
        ->select('hoadonban.*', 'cthoadonban.*') // Thêm 'hoadonban.tenLoaiSP' vào select
        ->get();
        $output = '';
        $output = '
        <style> 
        body {
            font-family: DejaVu Sans;
        }
        .invoice-box {
            width: 80%;
            margin: 40px auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            background-color: #fff;
        }
        .invoice-header, .invoice-footer {
            text-align: center;
            margin-bottom: 20px;
        }
        .invoice-details, .invoice-items {
            width: 100%;
            margin-bottom: 20px;
        }
        .invoice-details td, .invoice-items td {
            padding: 8px;
            border-bottom: 1px solid #eee;
        }
        .invoice-items th {
            padding: 8px;
            background-color: #f2f2f2;
            border-bottom: 1px solid #ddd;
        }
        .total {
            font-weight: bold;
        }
        </style>
        <div class="invoice-box">
        <div class="invoice-header">
            <h1>Thanh Phương đặc sản hà nội</h1>
            <p>Địa chỉ: Thị trấn Văn Giang, Văn Giang, Hưng Yên</p>
            <p>Số điện thoại: 0358345430</p>
        </div>
    
        <table class="invoice-details">
            <tr>
                <td>Hóa đơn số: '.$hdb->idHoaDonBan.'</td>
                <td>Ngày:'.date("d/m/Y").'</td>
            </tr>
            <tr>
                <td>Khách hàng: '.$hdb->tenKhachHang.'</td>
                <td>Số điện thoại: '.$hdb->soDienThoai.'</td>
            </tr>
        </table>
    
        <table class="invoice-items">
            <tr>
                <th>Sản phẩm</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Thành tiền</th>
            </tr>';
    
    foreach ($all_cthdb as $ct) {
        $output .= '
            <tr>
                <td>'.$ct->tenSanPham.'</td>
                <td>'.$ct->soLuong.'</td>
                <td>'.$ct->giaBan.'</td>
                <td>'.$ct->soLuong * $ct->giaBan.'</td>
            </tr>';
    }
    
    $output .= '
    <tr >
    <td colspan="5" style="text-align:center"><b>Tổng tiền: '.$hdb->tongTien.'</b></td>

</tr>
        </table> <!-- Close table here, after the loop -->
        <div class="invoice-footer">
            <p>Cảm ơn quý khách đã mua hàng!</p>
        </div>
    </div>';
    
    return $output;
    
        //dd($all_cthdb);
    }
}
