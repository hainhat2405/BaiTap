<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\SanPhamModel;
use App\Models\Admin\KhachHangModel;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Cart;
session_start();


class CheckoutController extends Controller
{
    public function show_home(Request $request){
        $Customer_email = $request->customer_email;
        $Customer_password = md5($request->customer_password);

        $result = DB::table('tbl_customers')->where('Customer_email',$Customer_email)->where('Customer_password',$Customer_password)->first();
        
    // dd($kh1);
        if($result){
            Session::put('Customer_id',$result->Customer_id);
            Session::put('Customer_name',$result->Customer_name);
            $kh = DB::table('khachhang')
        ->where('Customer_id', Session::get('Customer_id'))
        ->get();
    
    // Khởi tạo biến $kh1 trước vòng lặp để tránh lỗi khi không có bản ghi nào
    $kh1 = null;
    
    // Lặp qua collection để truy cập vào mỗi bản ghi và lấy giá trị của trường 'tenKhachHang'
    foreach ($kh as $customer) {
        $kh1 = $customer->idKhachHang;
        // Xử lý dữ liệu tại đây nếu cần
    }
    
    // Hoặc chỉ định một bản ghi cụ thể từ collection sử dụng first() nếu bạn chỉ muốn lấy một bản ghi đầu tiên
    $first_customer = $kh->first();
    if ($first_customer) {
        $kh1 = $first_customer->idKhachHang;
    }
    Session::put('idKhachHang',$kh1);
        //    dd(Session::get('idKhachHang'));
        
            return Redirect::to('/home')->with('kh',$kh);

        }
        else{
            Session::put('message','Email hoặc password sai');
            return Redirect::to('/login-Customers');

        }
    }
    
    public function login_Customers(){
        $lsp = DB::table('loaisanpham')->where('Status', '1')->orderby('idLoaiSP')->get();
        return view("User.Login_Customers",compact('lsp'));
    }
    public function logout_Customers(){
        Session::flush();
        return Redirect::to("/login-Customers");
    }
    public function register_customer(){
        return view('User.Register_Customers');
    }
    public function add_customer(Request $request){
        $data = array();
        $data['Customer_name'] = $request->customer_name;
        $data['Customer_email'] = $request->customer_email;
        $data['Customer_password'] = md5($request->customer_password); // mã hóa password
        $data['Customer_phone'] = $request->customer_phone;
        $customer_id = DB::table('tbl_customers')->insertGetId($data);
        Session::put('Customer_id',$customer_id);
        Session::put('Customer_name',$request->customer_name);
        return Redirect::to('/login-Customers');
    }
    public function checkout(){
        $lsp = DB::table('loaisanpham')->where('Status', '1')->orderby('idLoaiSP')->get();
        return view("User.thanhToan",compact('lsp'));
    }
    public function save_checkout_customer(Request $request){

        $data_payment = array();
        $data_payment['payment_method'] = $request->payment_cash;
        if( $data_payment['payment_method']){
            $data_payment['payment_status']="chờ xử lý";
        }
        $data_payment['payment_method'] = $request->payment_banking;
        if( $data_payment['payment_method']){
            $data_payment['payment_status']="chờ xử lý";
        }
        
        $payment_id = DB::table('tbl_payment')->insertGetId($data_payment);
        Session::put('payment_id',$payment_id);

        $data = array();
        $data['tenKhachHang'] = $request->tenKhachHang;
        $data['Customer_id'] = Session::get('Customer_id');
        $data['payment_id'] = $payment_id;
        $data['soDienThoai'] = $request->soDienThoai;
        $data['diaChi'] = $request->diaChi;
        $data['email'] = $request->email;
        $data['ngaySinh'] = $request->ngaySinh;
        $khachhang_id = DB::table('khachhang')->insertGetId($data);
        Session::put('idKhachHang',$khachhang_id);

        //get payment_method


        //insert order
        $data_order = array();
        $data_order['Customer_id'] = Session::get('Customer_id');
        $data_order['idKhachHang'] = Session::get('idKhachHang');
        $data_order['payment_id'] = $payment_id;
        $data_order['order_total'] = Cart::subtotal();
        $data_order['order_status'] = 0;
        $order_id = DB::table('tbl_order')->insertGetId($data_order);
        Session::put('order_id',$order_id);

        $content = Cart::content();
        //insert order_detail
        foreach($content as $v_content){
            $data_order_detail = array();
            $data_order_detail['order_id'] = $order_id;
            $data_order_detail['idSanPham'] = $v_content->id;
            $data_order_detail['tenSanPham'] = $v_content->name;
            $data_order_detail['giaBan'] = $v_content->price;
            $data_order_detail['product_sales_quantity'] = $v_content->qty;
            $order_detail_id = DB::table('tbl_order_detail')->insert($data_order_detail);
        }
        if($data_payment['payment_method']==1){
            return Redirect::to('/payment');
        }
        else{
            return Redirect::to('/payment');
        }
        
        //return Redirect::to('/payment');
    }
    public function save_payment_customer(Request $request){
        $n=0;
        //insert order
        $kh = KhachHangModel::all();
        $data_order = array();
        $data_order['Customer_id'] = Session::get('Customer_id');
        $data_order['idKhachHang'] = $kh[$n]->idKhachHang;
        $data_order['payment_id'] =  $kh[$n]->payment_id;
        $data_order['order_total'] = Cart::subtotal();
        $data_order['order_status'] = 0;
        $order_id = DB::table('tbl_order')->insertGetId($data_order);

        $content = Cart::content();
        //insert order_detail
        foreach($content as $v_content){
            $data_order_detail = array();
            $data_order_detail['order_id'] = $order_id;
            $data_order_detail['idSanPham'] = $v_content->id;
            $data_order_detail['tenSanPham'] = $v_content->name;
            $data_order_detail['giaBan'] = $v_content->price;
            $data_order_detail['product_sales_quantity'] = $v_content->qty;
            $order_detail_id = DB::table('tbl_order_detail')->insert($data_order_detail);
        }
        if(Session::get('payment_id')==1){
            return Redirect::to('/payment');
        }
        else{
            return Redirect::to('/payment');
        }
        
        //return Redirect::to('/payment');
    }
    public function payment(){
        $info_kh = DB::table('tbl_customers')->orderBy('Customer_id')->get();
        $lsp = DB::table('loaisanpham')->where('Status', '1')->orderby('idLoaiSP')->get();
        return view('User.payment',compact('lsp','info_kh'));
    }
    
    // public function show($idKhachHang)
    // {
    //     $nv = KhachHangModel::where('idKhachHang',$idKhachHang)->first();
    //     if(!$nv){
    //         return abort(404);
    //     }
    //     $idKhachHang = $nv->idKhachHang;
    //     $tenKhachHang = $nv->tenKhachHang;
    //     $hinhAnh = $nv->hinhAnh;
    //     $diaChi = $nv->diaChi;
    //     $ngaySinh = $nv->ngaySinh;
    //     $email = $nv->email;
    //     $Status = $nv->Status;
    //     $soDienThoai = $nv->soDienThoai;
    //     return view('admin.nhanvien.detail_nv',compact('idKhachHang','tenKhachHang','soDienThoai','Status','email','ngaySinh','diaChi','hinhAnh','chucVu'));
    // }


}