<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\manageOrderModel;
use App\Models\Admin\OrderModel;
use App\Models\Admin\SanPhamModel;
use App\Models\Admin\OrderDetailModel;
use App\Models\Admin\KhachHangModel;
use App\Models\Admin\SalesInvoice;
use App\Models\Admin\SalesInvoiceDetail;
use DB;
use Session;
class Manage_orderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = manageOrderModel::paginate(5);
        $all_order = DB::table('tbl_order')
        ->join('tbl_customers','tbl_order.Customer_id', '=', 'tbl_customers.Customer_id')
        ->select('tbl_order.*', 'tbl_customers.*')
        ->orderby('tbl_order.order_id')->get();

        return view('admin.manage_order.manageOrder',compact('all_order','order'));
    }
    public function viewConfirm(){
        $order = manageOrderModel::paginate(5);
        $all_order = DB::table('tbl_order')
        ->join('tbl_customers','tbl_order.Customer_id', '=', 'tbl_customers.Customer_id')
        ->select('tbl_order.*', 'tbl_customers.*')
        ->orderby('tbl_order.order_id')->get();

        return view('admin.manage_order.confirm',compact('all_order','order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function confirm(Request $request,$order_id)
    {

        // Fetch all orders including updated one
        $all_order = DB::table('tbl_order')
            ->join('tbl_customers', 'tbl_order.Customer_id', '=', 'tbl_customers.Customer_id')
            ->select('tbl_order.*', 'tbl_customers.*')
            ->orderBy('tbl_order.order_id')
            ->get();

        // Paginate the orders
        // $order = manageOrderModel::paginate(5);
        $order = OrderModel::find($order_id);
        if (!$order) {
            return abort(404); // Xử lý khi không tìm thấy đơn hàng
        }
    
        // Lấy tên khách hàng từ đơn hàng
        $idKH = $order->idKhachHang;
        $info_kh = KhachHangModel::find($idKH);
        // $tenKH = $info_kh->tenKhachHang;
        // dd($tenKH);
        // Tạo một đối tượng SalesInvoice và sao chép thông tin từ đơn hàng
        $salesInvoice = new SalesInvoice();
        $salesInvoice->idKhachHang = $order->idKhachHang;
        // $salesInvoice->idHoaDonBan = $order->idHoaDonBan;
        $salesInvoice->tenKhachHang = $info_kh->tenKhachHang;
        $salesInvoice->diaChi = $info_kh->diaChi;
        $salesInvoice->soDienThoai = $info_kh->soDienThoai;
        $salesInvoice->ngayBan = now(); // Đặt ngày bán là ngày hiện tại
        $salesInvoice->tongTien = $order->order_total;
        // $salesInvoice->ghiChu = $order->ghiChu;
        $salesInvoice->save(); // Lưu hóa đơn vào cơ sở dữ liệu
        // Cập nhật trạng thái của đơn hàng thành "đã xác nhận"
        $order->order_status = 1;
        $order->save();
    
        // Lấy các mục chi tiết đơn hàng tương ứng với đơn hàng
        $orderDetails = OrderDetailModel::where('order_id', $order_id)->get();
        // Tạo các chi tiết hóa đơn bán hàng từ các mục chi tiết đơn hàng và lưu chúng vào cơ sở dữ liệu
        foreach ($orderDetails as $detail) {
            $product = SanPhamModel::find($detail->idSanPham);
            if ($product) {
                $product->soLuong -= $detail->product_sales_quantity;
                $product->save();
            } else {
                // Xử lý khi sản phẩm không tồn tại
                // Ví dụ: Bạn có thể ghi log hoặc thực hiện hành động phù hợp khác
            }
            $salesInvoiceDetailData['idHoaDonBan']=$salesInvoice->idHoaDonBan;
            $salesInvoiceDetailData['idSanPham']=$detail->idSanPham;
            $salesInvoiceDetailData['tenSanPham']=$detail->tenSanPham;
            $salesInvoiceDetailData['soLuong']=$detail->product_sales_quantity;
            $salesInvoiceDetailData['giaBan']=$detail->giaBan;
            $salesInvoiceDetailData['thanhTien']= $order->order_total;
            DB::table('cthoadonban')->insert($salesInvoiceDetailData);
        }
        session()->flash('success', 'Xác nhận đơn hàng thành công');
        return view('admin.manage_order.confirm', compact('order', 'all_order'));
    }

    public function viewUnConfirm(){
        $order = manageOrderModel::paginate(5);
        $all_order = DB::table('tbl_order')
        ->join('tbl_customers','tbl_order.Customer_id', '=', 'tbl_customers.Customer_id')
        ->select('tbl_order.*', 'tbl_customers.*')
        ->orderby('tbl_order.order_id')->get();

        return view('admin.manage_order.unConfirm',compact('all_order','order'));
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
    public function show($order_id)
    {
        $order_byID = DB::table('tbl_order')
        ->join('tbl_customers', 'tbl_order.Customer_id', '=', 'tbl_customers.Customer_id')
        ->join('khachHang', 'tbl_order.idKhachHang', '=', 'khachHang.idKhachHang')
        ->join('tbl_order_detail', 'tbl_order.order_id', '=', 'tbl_order_detail.order_id')
        ->select('tbl_order.*', 'tbl_customers.*', 'khachHang.*', 'tbl_order_detail.*')
        ->where('tbl_order.order_id', $order_id)
        ->first();
        $order = DB::table('tbl_order_detail')
        ->join('tbl_order', 'tbl_order.order_id' , '=' , 'tbl_order_detail.order_id' )
        ->where('tbl_order_detail.order_id', $order_id)
        ->get();
        $status =  $order_byID->order_status;
        return view('admin.manage_order.detail_order', compact('order_byID','order','status'));
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
