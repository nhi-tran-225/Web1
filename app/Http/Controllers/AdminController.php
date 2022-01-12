<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use DB;
session_start();
    
class AdminController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function index()
    {
        return view('admin_login');
    }
    public function showDashboard()
    {
        $this -> AuthLogin();
        return view('admin.dashboard');
    }
    public function Dashboard(Request $request)
    {
        $admin_email = $request -> input('admin_email');
        $admin_password = $request -> input('admin_pass');

        $result = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_pass',$admin_password)->first();
        if($result){
            Session::put('admin_name',$result->admin_name);
            Session::put('admin_id',$result->admin_id);
            return Redirect::to('/dashboard');
        }else{
            Session::put('message','Mật khẩu hoặc tài khoản không hợp lệ. Nhập lại');
            return Redirect::to('/admin');
        }
    }
    public function logout()
    {
        $this -> AuthLogin();
        Session::put('admin_name',null);
            Session::put('admin_id',null);
         return Redirect::to('/admin');   
    }
}
