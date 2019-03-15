<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class NodesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_roles = DB::table('roles')->orderBy('id','asc')->paginate(5);
        $data_nodes = DB::table('nodes')->orderBy('id','asc')->get();
        return view('admin.nodes.index',['data_roles'=>$data_roles,'data_nodes'=>$data_nodes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.nodes.add');
    }

    public function nodeadd()
    {
        return view('admin.nodes.nodeadd');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ],[
            'name.required'=>'角色名必填',
        ]);
        $data = $request->except('_token');
        $res = DB::table('roles')->insert($data);
        if ($res) {
            return redirect('/admin/nodes')->with('success', '添加成功');
        }else{
            return back()->with('success','添加失败');
        }
    }

    public function insert(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'cname' => 'required',
            'aname' => 'required',
        ],[
            'name.required'=>'节点描述必填',
            'cname.required'=>'控制器名称必填',
            'aname.required'=>'方法名必填',
        ]);
        $data = $request->except('_token');
        $data['cname'] = strtolower($data['cname']);
        $data['aname'] = strtolower($data['aname']);
        if(substr($data['cname'],-10) != 'controller'){
            $data['cname'] = $data['cname'].'controller';
        }
        $res = DB::table('nodes')->insert($data);
        if ($res) {
            return redirect('/admin/nodes')->with('success', '节点添加成功');
        }else{
            return back()->with('success','节点添加失败');
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
        $role = DB::table('roles')->where('id',$id)->first();
        $roles_nodes_data = DB::table('roles_nodes')->where('rid',$id)->get();
        $roles_nodes_nid=[];
        foreach($roles_nodes_data as $k=>$v){
            $roles_nodes_nid[]=$v->nid;
        }
        $nodes = DB::table('nodes')->get();
        return view('admin.nodes.nodes',['role'=>$role,'nodes'=>$nodes,'roles_nodes_nid'=>$roles_nodes_nid]);
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
        $nids = $request->input('nids');
        DB::table('roles_nodes')->where('rid',$id)->delete();
        if($nids){
            foreach ($nids as $key => $value) {
                $data = [
                    'rid'=>$id,
                    'nid'=>$value
                ];
                DB::table('roles_nodes')->insert($data);
            }
        }
        return redirect('/admin/nodes')->with('success', '权限修改成功');
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
