<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
class AdminLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.login.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->session()->flush();
        return redirect('/admin/login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $user = DB::table('admin_users')->where('user',$data['user'])->first();
        if($user){
            if(Hash::check($data['password'],$user->password)){
                session(['admin_user'=>$user->user,'level'=>$user->level]);
                $admin_nodes =DB::select('select n.cname,n.aname from nodes as n,users_roles as ur,roles_nodes as rn where ur.uid = '.$user->id.' and ur.rid = rn.rid and rn.nid = n.id');
                $arr = [];
                foreach ($admin_nodes as $key => $value) {
                    $arr[$value->cname][] = $value->aname;
                        if($value->aname == 'create'){
                            $arr[$value->cname][] = 'store';
                        }
                        if($value->aname == 'edit'){
                            $arr[$value->cname][] = 'update';
                        }
                }
                $arr['indexcontroller'][] = 'index';
                $arr['gerencontroller'][] = 'index';
                $arr['gerencontroller'][] = 'create';
                $arr['gerencontroller'][] = 'store';
                session(['admin_node_type'=>$arr]);
                return redirect('/admin')->with('success','登录成功');
            }else{
                return back()->with('error','密码有误');
            }
        }else{
            return back()->with('error','没有此用户名');
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
