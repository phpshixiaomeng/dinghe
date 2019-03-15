<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         //获取搜索栏内容
        $search = $request->input('search','');
        //查看admin_users广告表
        $data = DB::table('admin_users')->where('user','like','%'.$search.'%')->orderBy('id','asc')->paginate(5);
        //判断是否查询,统计数据
        if($search == ''){
            $num = DB::table('admin_users')->count();
        }else{
            $num = DB::table('admin_users')->where('user','like','%'.$search.'%')->count();
        }
        //将查询到的数据返回页面
        return view('admin.admin_user.index',['data'=>$data,'request'=> $request->all(),'num'=>$num]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admin_user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users = $request->except('_token');
        if(DB::table('admin_users')->where('user',$users['user'])->first()){
           return back()->with('error','用户名存在');
        }
        if($users['password']==$users['repassword']){
            unset($users['repassword']);
        }
        $users['password'] = Hash::make($users['password']);
        $res = DB::table('admin_users')->insert($users);
        if($res){
            return redirect('/admin/user')->with('success','添加管理员成功');
        }else{
            return back()->with('error','未知错误');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('admin_users')->where('id',$id)->select('user','id')->first();
        return view('admin.admin_user.edit',['data'=>$data]);
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
        $data = $request->except('_token','_method');
        if($data['password']==$data['repassword']){
            unset($data['repassword']);
            $data['password'] = Hash::make($data['password']);
        }
        $res = DB::table('admin_users')->where('id',$id)->update($data);
        if($res){
            return redirect('/admin/user')->with('success','修改管理员成功');
         }else{
            return back()->with('error','未知错误');
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = DB::table('admin_users')->where('id',$id)->delete();
        if($res){
            return redirect('/admin/user')->with('success','删除管理员成功');
        }else{
            return back()->with('error','未知错误');
        }
    }
    public function role($id)
    {
        $user = DB::table('admin_users')->where('id',$id)->first();
        $users_roles_data = DB::table('users_roles')->where('uid',$id)->get();
        $users_roles_rid = [];
        foreach ($users_roles_data as $key => $value) {
            $users_roles_rid[] = $value->rid;
        }
        $roles_data = DB::table('roles')->get();
        return view('admin.admin_user.role',['user'=>$user,'roles_data'=>$roles_data,'users_roles_rid'=>$users_roles_rid]);
    }
    public function updaterole(Request $request,$id)
    {
        $rid = $request->input('rids');
        DB::table('users_roles')->where('uid',$id)->delete();
        if($rid){
            foreach ($rid as $key => $value) {
                $data = [
                    'rid'=>$value,
                    'uid'=>$id
                ];
                DB::table('users_roles')->insert($data);
            }
        }
        return redirect('/admin/user')->with('success','修改成功');
    }
}
