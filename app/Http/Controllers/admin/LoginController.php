<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class LoginController extends Controller
{
    /**
     *  后台登录页面
     */
    public function index()
    {
    	return view('admin/login');
    }

    /**
     *  执行登录代码
     */
    public function login()
    {
    	$data['name'] = $_POST['name'];
    	$data['password'] = md5($_POST['password']);
    	$login = DB::table('admin_users')->where($data)->first();
    	// dd($login);	
    	if(!empty($login)){
    		echo '登录成功';
    	}else{
    		echo '登录失败';
    	}
    }
}
