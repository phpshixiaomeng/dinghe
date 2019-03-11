<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\luntan_faties;
use App\Models\Admin\luntan_huities;
use DB;
class LuntanController extends Controller
{
    /**
     * @论坛发帖查询
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         //获取搜索栏内容
        $search = $request->input('search','');
        //查看faite表
        $data = luntan_faties::where('title','like','%'.$search.'%')->paginate(5);
        //判断是否查询,统计数据
        if($search == ''){
            $num = luntan_faties::count();
        }else{
            $num = luntan_faties::where('title','like','%'.$search.'%')->count();
        }
        //将查询到的数据返回页面
        return view('admin.luntan.index',['data'=>$data,'request'=> $request->all(),'num'=>$num]);

    }


    /**
     * @论坛发帖详情显示
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = luntan_faties::where('id',$id)->first();
        echo $data->content;
    }

    /**
     * @论坛回复帖子
     *
     *
     */
    public function reply(Request $request,$id)
    {
        //查看回帖表
        $data = luntan_huities::where('fatie_id',$id)->where('father_id','0')->paginate(5);
        //统计回帖数量
        $num = luntan_huities::where('fatie_id',$id)->where('father_id','0')->count();
        return view('admin.luntan.reply',['data'=>$data,'request'=> $request->all(),'num'=>$num]);
    }

    /**
     * @论坛评论
     *
     *
     */
    public function huifu($id)
    {
        //查看回帖表
        $huitie = luntan_huities::where('id',$id)->first();
        //查看回帖子类表
        $huifu = luntan_huities::where('father_id',$id)->get();
        return view('admin.luntan.xiangqing',['huitie'=>$huitie,'huifu'=>$huifu]);
    }

    /**
     * @删除回帖子类表
     *
     *
     */
    public function deleted($id)
    {
        //删除回帖子类表
        $res = luntan_huities::where('id',$id)->delete();
        if($res){
            return 'success';
        }else{
            return 'error';
        }
    }

    /**
     * @删除回帖表
     *
     *
     */
     public function del($id)
    {
        //删除回帖子类
        luntan_huities::where('father_id',$id)->delete();
        //删除回帖表
        $res = luntan_huities::where('id',$id)->delete();
        if($res)
        {
            return back()->with('success','删除成功');
        }else{
            return back()->with('error','未知错误');
        }
    }

    /**
     * @删除帖子表
     *
     *
     */
    public function delete($id)
    {
        //查询回帖表
        luntan_huities::where('fatie_id',$id)->delete();
        //删除发帖表
        $res = luntan_faties::where('id',$id)->delete();
        if($res)
        {
            return redirect('/admin/luntan')->with('success','删除成功');
        }else{
            return redirect('/admin/luntan')->with('error','未知错误');
        }
    }
}
