<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\luntan_faties;
use App\Models\Admin\luntan_huities;
use App\Models\Admin\luntan_zans;
use DB;
class LuntanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tiezi = luntan_faties::orderBy('updated_at','desc')->paginate(10);
        foreach ($tiezi as $k => $v) {
            $v['num'] = luntan_huities::where('fatie_id',$v->id)->count();
        }
        return view('Home.luntan.index',['tiezi'=>$tiezi,'request'=> $request->all()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Home.luntan.fatie');
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
            'title' => 'required',
            'content'=>'required',
        ],[
            'title.required'=>'话题标题必填',
            'content.required'=>'话题内容必填',
        ]);
        $data = $request->except('_token');
        if(session('name')){
            $fatie = new luntan_faties;
            $fatie->title = $data['title'];
            $fatie->content = $data['content'];
            $fatie->uname = session('name');
            $res = $fatie->save();
            if($res){
                return redirect('/home/luntan')->with('success','发帖提交成功');
            }else{
                return back()->with('error','发帖提交失败');
            }
        }else{
            return redirect('/home/login')->with('error','请查看是否登录');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $arr = luntan_faties::find($id);
        if($arr){
            $visit['visit'] = $arr->visit+1;
            $res = DB::table('luntan_faties')->where('id',$id)->update($visit);
            $tiezi = luntan_faties::find($id);
            $data = luntan_huities::where('fatie_id',$id)->where('father_id','0')->paginate(10);
            foreach ($data as $k => $v) {
                $v['son'] = luntan_huities::where('father_id',$v->id)->get();
            }
            $num = luntan_huities::where('fatie_id',$id)->count();
            $zan = luntan_zans::where('fatie_id',$id)->where('zan','1')->count();
            $cai = luntan_zans::where('fatie_id',$id)->where('cai','1')->count();
            return view('Home.luntan.xiangqing',['tiezi'=>$tiezi,'data'=>$data,'request'=> $request->all(),'num'=>$num,'zan'=>$zan,'cai'=>$cai]);
        }else{
            return redirect('/home/luntan');
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
    public function huitie(Request $request)
    {
        $this->validate($request, [
            'content' => 'required',
            'fatie_id'=>'required',
            'reply_name'=>'required',
        ],[
            'content.required'=>'评论内容必填',
            'fatie_id.required'=>'此贴发生未知错误',
            'reply_name.required'=>'此贴发生未知错误',
        ]);
        $data = $request->except('_token');
        if(session('name')){
            $huitie = new luntan_huities;
            $huitie->content = $data['content'];
            $huitie->fatie_id = $data['fatie_id'];
            $huitie->reply_name = $data['reply_name'];
            $huitie->uname = session('name');
            $res = $huitie->save();
            if($res){
                $fatie = luntan_faties::find($data['fatie_id']);
                $fatie->updated_at = time();
                $fatie->save();
                return redirect('/home/luntan/'.$data['fatie_id'])->with('success','发帖提交成功');
            }else{
                return back()->with('error','发帖提交失败');
            }
        }else{
            return redirect('/home/login')->with('error','请查看是否登录');
        }
    }
    public function huifu(Request $request)
    {
        $this->validate($request, [
            'content' => 'required',
            'fatie_id'=>'required',
            'father_id'=>'required',
            'reply_name'=>'required',
        ],[
            'content.required'=>'评论内容必填',
            'fatie_id.required'=>'此贴发生未知错误',
            'father_id.required'=>'此贴发生未知错误',
            'reply_name.required'=>'此贴发生未知错误',
        ]);
        $data= $request->except('_token');
        $array=explode(':', $data['content']);
        $num = count($array);
        if($num == 1){
            if(session('name')){
                $huitie = new luntan_huities;
                $huitie->content = $data['content'];
                $huitie->fatie_id = $data['fatie_id'];
                $huitie->father_id = $data['father_id'];
                $huitie->reply_name = $data['reply_name'];
                $huitie->uname = session('name');
                $res = $huitie->save();
                if($res){
                    $fatie =  luntan_faties::find($data['fatie_id']);
                    $fatie->updated_at = time();
                    $fatie->save();
                    return back()->with('success','回复提交成功');
                }else{
                    return back()->with('error','发帖提交失败');
                }
            }else{
                return redirect('/home/login')->with('error','请查看是否登录');
            }
        }
        $new_name=explode('@', $array[0]);
        if($new_name[0] == '回复'){
            if(session('name')){
                $huitie = new luntan_huities;
                $huitie->content = $data['content'];
                $huitie->fatie_id = $data['fatie_id'];
                $huitie->father_id = $data['father_id'];
                $huitie->reply_name = $new_name[1];
                $huitie->uname = session('name');
                $res = $huitie->save();
                if($res){
                    $fatie =  luntan_faties::find($data['fatie_id']);
                    $fatie->updated_at = time();
                    $fatie->save();
                    return back()->with('success','回复提交成功');
                }else{
                    return back()->with('error','发帖提交失败');
                }
            }else{
                return redirect('/home/login')->with('error','请查看是否登录');
            }
        }else{
           if(session('name')){
                $huitie = new luntan_huities;
                $huitie->content = $data['content'];
                $huitie->fatie_id = $data['fatie_id'];
                $huitie->father_id = $data['father_id'];
                $huitie->reply_name = $data['reply_name'];
                $huitie->uname = session('name');
                $res = $huitie->save();
                if($res){
                    $fatie =  luntan_faties::find($data['fatie_id']);
                    $fatie->updated_at = time();
                    $fatie->save();
                    return back()->with('success','回复提交成功');
                }else{
                    return back()->with('error','发帖提交失败');
                }
            }else{
                return redirect('/home/login')->with('error','请查看是否登录');
            }

        }

    }
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

    public function del($id)
    {
        luntan_huities::where('father_id',$id)->delete();
        $res = luntan_huities::where('id',$id)->delete();
        if($res)
        {
            return back()->with('success','删除成功');
        }else{
            return back()->with('error','未知错误');
        }
    }
    public function delete($id)
    {
        luntan_huities::where('fatie_id',$id)->delete();
        $res = luntan_faties::where('id',$id)->delete();
        if($res)
        {
            return redirect('/home/luntan')->with('success','删除成功');
        }else{
            return redirect('/home/luntan')->with('error','未知错误');
        }
    }
    public function zan($id)
    {
        if(session('name')){
            $arr = luntan_zans::where('fatie_id',$id)->where('uname',session('name'))->first();
            if($arr){
                $zans['msg'] = '你已经点过了';
            }else{
                $jia = [
                    'uname'=>session('name'),
                    'fatie_id'=>$id,
                    'zan'=>1
                ];
                $res = DB::table('luntan_zans')->insert($jia);
                if($res){
                    $zans['num'] = luntan_zans::where('fatie_id',$id)->where('zan','1')->count();
                    $zans['msg'] = 'success';

                }else{
                    $zans['msg'] = '发生未知错误,请刷新页面';
                }
            }
        }else{
            $zans['msg'] = '请你登录';
        }
        return json_encode($zans);
    }

    public function cai($id)
    {
        if(session('name')){
            $arr = luntan_zans::where('fatie_id',$id)->where('uname',session('name'))->first();
            if($arr){
                $zans['msg'] = '你已经点过了';
            }else{
                $jia = [
                    'uname'=>session('name'),
                    'fatie_id'=>$id,
                    'cai'=>1
                ];
                $res = DB::table('luntan_zans')->insert($jia);
                if($res){
                    $zans['num'] = luntan_zans::where('fatie_id',$id)->where('cai','1')->count();
                    $zans['msg'] = 'success';

                }else{
                    $zans['msg'] = '发生未知错误,请刷新页面';
                }
            }
        }else{
            $zans['msg'] = '请你登录';
        }
        return json_encode($zans);
    }
    public function xinxi(Request $request)
    {
        $xinxi = luntan_huities::where('reply_name',session('name'))->where('status','0')->get();
        if($xinxi){
            //改成已读
            foreach ($xinxi as $key => $value) {
                $status['status'] = 1;
                DB::table('luntan_huities')->where('id',$value->id)->update($status);
            }
        }
        $data = luntan_huities::where('reply_name',session('name'))->orderBy('updated_at','desc')->paginate(5);
        $num = luntan_huities::where('reply_name',session('name'))->count();
        return view('Home.luntan.xinxi',['data'=>$data,'request'=> $request->all(),'num'=>$num]);
    }
    public function num()
    {
        $num = luntan_huities::where('reply_name',session('name'))->where('status','0')->count();
        return $num;
    }
}
