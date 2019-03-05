<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class HelpController extends Controller
{
    /**
     * @添加反馈和帮助页面
     *
     *
     */
    public function index()
    {
        //查询数量
        $num = DB::table('helps')->where('uname',session('name'))->where('updated_at','>','0')->where('status','0')->where('deleted_at','0')->count();
        //返回页面未读数量
        return view('Home.helps.help',['num'=>$num]);
    }

    /**
     * @添加反馈和帮助
     *
     *
     */
    public function add(Request $request)
    {
        //筛选数据
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ],[
            'name.required'=>'反馈标题必填',
            'description.required'=>'反馈和帮助内容必填',
        ]);
        //取数据
        $helps = $request->except('_method','_token');
        //判断session里面用户名
        if(session('name')){
            $helps['uname'] = session('name');
            $helps['created_at'] = time();
            $res = DB::table('helps')->insert($helps);
            if($res){
                return redirect('/home/help')->with('success','反馈和帮助提交成功');
            }else{
                return back()->with('error','反馈和帮助提交失败');
            }
        }else{
            return back()->with('error','请查看是否登录');
        }
    }

    /**
     * @查看反馈帮助
     *
     *
     */
    public function reply(Request $request)
    {
        //取出反馈未读的回复
        $reply = DB::table('helps')->where('uname',session('name'))->where('updated_at','>','0')->where('status','0')->get();
        //判断是否有反馈未读的回复
        if($reply){
            //改成已读
            foreach ($reply as $key => $value) {
                $status['status'] = 1;
                DB::table('helps')->where('id',$value->id)->update($status);
            }
        }
        //查询历史反馈的回复
        $data = DB::table('helps')->where('uname',session('name'))->where('updated_at','>','0')->where('deleted_at','0')->orderBy('updated_at','desc')->paginate(3);
        $num = DB::table('helps')->where('uname',session('name'))->where('updated_at','>','0')->where('deleted_at','0')->orderBy('updated_at','desc')->count();
        return view('Home.helps.reply',['data'=>$data,'request'=> $request->all(),'num'=>$num]);
    }

    /**
     * @删除反馈和帮助
     *
     *
     */
     public function del($id)
    {
        $del['deleted_at'] = time();
        $res = DB::table('helps')->where('id',$id)->update($del);
        if($res){
            return redirect('/home/help/reply')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败请刷新后在删除');
        }
    }

}
