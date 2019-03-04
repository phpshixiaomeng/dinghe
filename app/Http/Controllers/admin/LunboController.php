<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class LunboController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search','');
        $data = DB::table('lunbotus')->where('gname','like','%'.$search.'%')->orderBy('id','asc')->paginate(2);
        if($search == ''){
            $select = DB::table('lunbotus')->get();
            $num = count($select);
        }else{
            $num = count($data);
        }
        return view('admin/lunbotu/list',['data'=>$data,'request'=> $request->all(),'num'=>$num,'i'=>1]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/lunbotu/add');
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

        $p2=$request->filled('image');

        if($p1!=1 || $p2!=1){
        $request->flashExcept('_token');
        return redirect('admin/lunbo/create')->with('error','有值为空,添加失败');
        }


        $data=$request->except('_token');
        $res=DB::table('lunbotus')->insert($data);
        if($res){
        return redirect('admin/lunbo')->with('success','添加成功');
    }else{
        return redirect('admin/lunbo/create')->with('error','添加失败');
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
        $show = DB::table('lunbotus')->where('id',$id)->first();
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
        $data = DB::table('lunbotus')->where('id',$id)->first();
        $res = DB::table('lunbotus')->where('id',$id)->delete();
        if($res){
            $image = $data->image;
            $path = '../public/uploads/'.$image;
            unlink($path);
            return redirect('/admin/lunbo')->with('success', '删除成功');
        }else{
            return back()->with('error', '删除未成功');
        }
    }


    public function upload(Request $request)
    {
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

                $file_name = $name->storeAs('lunbotu',$fname);
                $arr = [
                    'msg'=>'success',
                    'path'=>'lunbotu/'.$fname,

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
            $res = DB::table('lunbotus')->where('id',$id)->update($data);
            if($res && $status==0){
            return redirect('/admin/lunbo')->with('error', '图片已禁用');
            }elseif($res && $status==1){
            return redirect('/admin/lunbo')->with('success', '图片已通过');
        }   else{
            return back()->with('error', '修改失败请刷新重试');
            }
    }

     public function del(Request $request)
    {
        $data= $request->input('delid');
        $str = explode( ',',$data);
        $i=0;
        foreach($str as $k=>$v){
            if($v!=''){
                $select = DB::table('lunbotus')->where('id',$v)->first();
                $image = $select->image;
                $path = '../public/uploads/'.$image;
                unlink($path);
                $del=DB::table('lunbotus')->where('id',$v)->delete();
                $i++;
            }
        }
        $message = '批量删除'.$i.'条';
        return back()->with('success', "$message");
    }





}
