<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ZixunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
                 $search = $request->input('search','');
        $data = DB::table('news')->where('title','like','%'.$search.'%')->orderBy('id','asc')->paginate(5);
        if($search == ''){
            $select = DB::table('news')->get();
            $num = count($select);
        }else{
            $num = count($data);
        }
        $cate=DB::table('news_cs')->get();
        return view('admin/zixun/list',['data'=>$data,'request'=> $request->all(),'num'=>$num,'i'=>1,'cate'=>$cate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/zixun/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $p1=$request->filled('gname');

        $p2=$request->filled('auth');
        $p3=$request->filled('contact');
        $p4=$request->filled('title');
        $p5=$request->filled('image');

        if($p1!=1 || $p2!=1 ||$p3!=1||$p4!=1||$p5!=1){
        $request->flashExcept('_token');
        return redirect('admin/zixun/create')->with('error','有值为空,添加失败');
        }
        $data=$request->except('_token');
        $data['created_at']=date('Y-m-d H:i:s',time());
        $res=DB::table('news')->insert($data);

        if($res){
        return redirect('admin/zixun')->with('success','添加成功');
     }else{
        return redirect('admin/zixun/create')->with('error','添加失败');
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
        $show = DB::table('news')->where('id',$id)->first();
        $path = "/uploads/".$show->image;
        echo '<img src="'.$path.'"style="width:400px;height:400px;">';
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
        $data = DB::table('news')->where('id',$id)->first();
        $res = DB::table('news')->where('id',$id)->delete();
        if($res){
            $image = $data->image;
            $path = '../public/uploads/'.$image;
            unlink($path);
            return redirect('/admin/zixun')->with('success', '删除成功');
        }else{
            return back()->with('error', '删除未成功');
        }
    }
    public function del(Request $request){

        $data= $request->input('delid');
        $str = explode( ',',$data);
        $i=0;
        foreach($str as $k=>$v){
            if($v!=''){
                $select = DB::table('news')->where('id',$v)->first();
                $image = $select->image;
                $path = '../public/uploads/'.$image;
                unlink($path);
                $del=DB::table('news')->where('id',$v)->delete();
                $i++;
            }
        }
        $message = '批量删除'.$i.'条';
        return back()->with('success', "$message");

    }
    public function upload(Request $request){
            $type = $_FILES['image']['name'];
        $ext = strrchr($type,'.');
        $img = ['.jpg','.jpeg','.png','.gif','.JPG','.JPEG','.PNG','.GIF'];
        if(!in_array($ext,$img)){
            $arr = [
                'msg'=>'error',
                'path'=>' ',
            ];
        }elseif($request->hasFile('image'))
            {
                $name=$request->file('image');
                $zname=$name->extension();
                $fname=time()+rand('111','999').'.'.$zname;
                $file_name = $name->storeAs('zixun',$fname);
                $arr = [
                    'msg'=>'success',
                    'path'=>'zixun/'.$fname,
                ];
            }else{
                $arr = [
                    'msg'=>'errors',
                    'path'=>' ',
                ];
            }
            return json_encode($arr);
    }

    public function status($id,$status){

            $data['status'] = $status;
            $res = DB::table('news')->where('id',$id)->update($data);
            if($res && $status==0){
            return redirect('/admin/zixun')->with('error', '资讯已禁用');
            }elseif($res && $status==1){
            return redirect('/admin/zixun')->with('success', '资讯已通过');
        }   else{
            return back()->with('error', '修改失败请刷新重试');
            }
    }

    public function xiangqing($id){
        $count=DB::table('news_pls')->where('gid',$id)->count();
        $data=DB::table('news_cs')->where('gid',$id)->first();
        if(!empty($data)){
        return view('admin.zixun.xiangqing',['data'=>$data,'count'=>$count]);
    }else{
        return back()->with('success','暂无内容');
    }
    }

    public function pinglun($id){
        $data=DB::table('news_pls')->where('gid',$id)->get();
        return view('admin.zixun.pinglun',['data'=>$data,'i'=>1]);
    }

    public function pinglunshanchu($id){
    $res=DB::table('news_pls')->where('id',$id)->delete();
    if($res){
        echo 1;
    }else{
        echo 2;
    }

    }
    public function content($id){

     return view('admin.zixun.addcontent',['id'=>$id]);
    }

    public function adcon(Request $request){
        //防空与添加简化内容同理

        $data=$request->except('_token');
        $res=DB::table('news_cs')->insert($data);
        if($res){
        DB::table('news')->where('id',$data['gid'])->update(['addjilu'=>'1']);
        echo '1';

        }else{
        echo '2';

        }



}
    public function contentedit($id){
        $data=DB::table('news_cs')->where('gid',$id)->first();
        return view('admin.zixun.editcontent',['data'=>$data]);

    }

    public function adconedit(Request $request){
        //防空与添加简化内容同理
        $data=$request->except('_token');
        $res=DB::table('news_cs')->where('id',$data['id'])->update($data);
        if($res){
            echo '1';

        }else{
          echo '2';


    }
}

}
