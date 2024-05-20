<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\AdminModel;
use App\Models\Admin\RolesModel;
use Auth;
use Hash;
class AuthController extends Controller
{
    public function authLogin()
    {
        // Check if admin is authenticated
        if (Auth::id()) {
            return Redirect::to('index'); // If authenticated, redirect to admin dashboard
        } else {
            return Redirect::to('loginAuth')->send(); // If not authenticated, redirect to login page
        }
    }

    public function resgiter(Request $req){
        $user = new AdminModel;
        $user->name = $req->input('name');
        $user->phone = $req->input('phone');
        $user->email = $req->input('email');
        $user->password = Hash::make($req->input('password'));
        $user->save();
        return $user;
    }

    // Method to show admin dashboard
    public function showDashboard()
    {
        $this->authLogin(); // Check authentication status
        return Redirect::to('index'); // Redirect to admin dashboard (if already authenticated)
    }
    public function index(){
        return view('admin.dashboard');
    }
    public function register_auth(){
        return view('admin.custom_auth.register');
    }
    public function logout_auth(){
        Auth::logout();
        return redirect('/login_auth')->with('message', 'Đăng xuất thành công');
    }

    public function login_auth(){
        return view('admin.custom_auth.login_auth');
    }
    public function loginAuth(Request $request){
        $this->validate($request,[
            'email' => 'required|email|max:255',
            'password' => 'required|max:255',
        ]);
        $data = $request->all();
        if(Auth::attempt(['email' => $request->email, 'password' =>  $request->password])){
            return redirect('/index');
        }
        else{
            return redirect('/login_auth')->with('message', 'Lỗi đăng nhập');
        }
    }
    public function register(Request $request){
        // Thực hiện xác nhận dữ liệu đầu vào
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|max:255',
            'name' => 'required|max:255',
            'phone' => 'required|max:255',
        ]);
    
        $data= $request->all();
    
        $admin = new AdminModel();
        $admin->name = $data['name'];
        $admin->email = $data['email'];
        $admin->password = md5($data['password']); // Sử dụng bcrypt để mã hóa mật khẩu
        $admin->phone = $data['phone']; // Bạn có thể mã hóa số điện thoại nếu muốn, nhưng không nên sử dụng MD5
        $admin->save();
        return redirect('/register_auth')->with('message', 'đăng ký thành công');
    }
    
    public function validation($request){
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|max:255',
            'name' => 'required|max:255',
            'phone' => 'required|max:255',
        ]);
    }
    
}
