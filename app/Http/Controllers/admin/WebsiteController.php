<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search','');
        $data = DB::table('websites')->where('title','like','%'.$search.'%')->orderBy('id','asc')->paginate(5);
        if($search == ''){
            $select = DB::table('websites')->get();
            $num = count($select);
        }else{
            $num = count($data);
        }
        return view('admin.websiteinformation.list',['user'=>$data,'request'=> $request->all(),'num'=>$num,'i'=>1]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.websiteinformation.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $p1=$request->filled('title');

        $p2=$request->filled('description');
        $p3=$request->filled('information');
        if($p1!=1 || $p2!=1 || $p3!=1){
        $request->flashExcept('_token');
        return redirect('admin/website/create')->with('error','有值为空,添加失败');
        }

        // echo 1;
        $data=$request->except('_token');
        $res=DB::table('websites')->insert($data);
        if($res==1){
        // echo "<script>alert('添加成功')</script>";
        return redirect('/admin/website')->with('success','添加成功');
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
        // echo 1;
        $res=DB::table('websites')->where('id',$id)->delete();
        if($res){
            return redirect('/admin/website')->with('success','删除成功');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $res=DB::table('websites')->where('status',$_GET['sta'])->first();
        if($_GET['sta']==1){
                $a=0;
            }else{
                $a=1;
            }
        if($res){

            DB::table('websites')->where('status',$_GET['sta'])->update(['status'=>$a]);
            DB::table('websites')->where('id',$id)->update(['status'=>$_GET['sta']]);
            return redirect('/admin/website')->with('success','使用成功');
        }else{


            $cz=DB::table('websites')->where('id','=',$id)->update(['status' =>$_GET['sta']]);

            return redirect('/admin/website')->with('success','使用成功');
        }
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
