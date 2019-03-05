<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class HelpController extends Controller
{
    /**
     * @反馈首页
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //获取搜索栏内容
        $search = $request->input('search','');
        //查询帮助与反馈表
        $data = DB::table('helps')->where('uname','like','%'.$search.'%')->where('deleted_at','0')->orderBy('updated_at','asc')->paginate(3);
        //判断数量
        if($search == ""){
            $num = DB::table('helps')->where('deleted_at','0')->count();
        }else{
            $num = DB::table('helps')->where('uname','like','%'.$search.'%')->where('deleted_at','0')->count();
        }

        return view('admin.helps.index',['data'=>$data,'request'=> $request->all(),'num'=>$num]);
    }

    /**
     * @回复页面
     *
     *
     */
    public function reply($id){
        $helps = DB::table('helps')->where('id',$id)->first();
        return view('admin.helps.reply',['helps'=>$helps]);
    }

    /**
     * @添加回复
     *
     *
     */
    public function add(Request $request,$id)
    {
        //判断传上来的数据
        $this->validate($request, [
            'reply' => 'required',
        ],[
            'reply.required'=>'回复内容必填',
        ]);
        //去掉_token和_method
        $replys = $request->except('_token','_method');
        $replys['updated_at'] = time();
        //修改数据库
        $res = DB::table('helps')->where('id',$id)->update($replys);
        if($res){
            return redirect('/admin/help')->with('success','回复成功');
        }else{
            return back()->with('error','回复失败');
        }
    }

    /**
     * @修改回复页面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $helps = DB::table('helps')->where('id',$id)->first();
        return view('admin.helps.update',['helps'=>$helps]);
    }

    /**
     * @修改回复
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //判断传上来的数据
        $this->validate($request, [
            'reply' => 'required',
        ],[
            'reply.required'=>'回复内容必填',
        ]);
        //去掉_token和_method
        $replys = $request->except('_token','_method');
        $replys['updated_at'] = time();
        $replys['status'] = 0;
        //修改数据库
        $res = DB::table('helps')->where('id',$id)->update($replys);
        if($res){
            $arr = [
            'msg'=>'success',
           ];
        }else{
            $arr = [
            'msg'=>'error',
            ];
        }
        return json_encode($arr);
    }

    /**
     * @将数据删除到回收站
     *
     *
     */
    public function del($id)
    {
        //进行自己写的软删除
        $deleted_at['deleted_at'] = time();
        //删除数据
        $helps = DB::table('helps')->where('id',$id)->update($deleted_at);
        if($helps){
            return redirect('/admin/help')->with('success','添加到回收站成功');
        }else{
            return back()->with('error','添加到回收站失败');
        }
    }

    /**
     * @查看回收站的历史
     *
     *
     */
    public function history(Request $request)
    {
        //获取搜索栏内容
        $search = $request->input('search','');
        //查询帮助与反馈表
        $data = DB::table('helps')->where('uname','like','%'.$search.'%')->where('deleted_at','>','0')->paginate(3);
        //判断数量
        if($search == ""){
            $num = DB::table('helps')->where('deleted_at','>','0')->count();
        }else{
            $num = DB::table('helps')->where('uname','like','%'.$search.'%')->where('deleted_at','>','0')->count();
        }
        return view('admin.helps.history',['data'=>$data,'request'=> $request->all(),'num'=>$num]);
    }

    /**
     * @删除历史
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //进行删除
        $res = DB::table('helps')->where('id',$id)->delete();
        if($res){
            return redirect('/admin/help/history')->with('success','永久删除成功');
        }else{
            return back()->with('error','永久删除失败');
        }
    }

    /**
     * @恢复回收站
     *
     *
     */
    public function huanyuan($id)
    {
        //进行自己写的还原
        $deleted_at['deleted_at'] = 0;
        $res = DB::table('helps')->where('id',$id)->update($deleted_at);
        if($res){
            return redirect('/admin/help/history')->with('success','还原成功');
        }else{
            return back()->with('error','还原失败');
        }
    }

    /**
     * @批量删除回收站
     *
     *
     */
    public function dels(Request $request)
    {
         //获取传输过来的批量删除的id
        $data= $request->input('delid');
        //把字符串的id拼接成数组
        $str = explode(',',$data);
        //设置一个变量来计算删除多少条
        $i=0;
        //遍历删除数据
        foreach($str as $k=>$v){
            if($v!=''){
                //删除数据
                $del=DB::table('helps')->where('id',$v)->delete();
                $i++;
            }
        }
        $message = '批量删除'.$i.'条';
        return back()->with('success', "$message");
    }
}
