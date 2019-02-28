<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search','');
        $data = DB::table('ads')->where('gname','like','%'.$search.'%')->orderBy('put','desc')->paginate(3);
        if($search == ''){
            $select = DB::table('ads')->get();
            $num = count($select);
        }else{
            $num = count($data);
        }
        return view('admin.ads.index',['data'=>$data,'request'=> $request->all(),'num'=>$num]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ads.add');
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
            'gname' => 'required',
            'title'=>'required',
            'image' => 'required',
        ],[
            'gname.required'=>'游戏名必填',
            'title.required'=>'广告标题必填',
            'image.required'=>'广告图片必填',

        ]);
        $data = $request->except('_token');
        $data['put'] = 0;
        $res = DB::table('ads')->insert($data);
        if($res){
            return redirect('/admin/ads')->with('success', '添加成功');
        }else{
            return back()->with('error', '添加失败');
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
        $show = DB::table('ads')->where('id',$id)->first();
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
        $data = DB::table('ads')->where('id',$id)->first();

        return view('admin.ads.edit',['data'=>$data]);
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
        $this->validate($request, [
            'gname' => 'required',
            'title'=>'required',
        ],[
            'gname.required'=>'游戏名必填',
            'title.required'=>'广告标题必填',
        ]);
        $data = $request->except('_token','_method');
        $arr = DB::table('ads')->where('id',$id)->first();//获取原图片信息
        if($arr->image == $data['image'] )
        {
            $res = DB::table('ads')->where('id',$id)->update($data);
            if($res){
                return redirect('/admin/ads')->with('success', '修改成功');
            }else{
                return back()->with('error', '内容未修改');
            }
        }else{
            $image = $arr->image;
            $path = '../public/uploads/'.$image;
            unlink($path);
            $res = DB::table('ads')->where('id',$id)->update($data);
            if($res){
                return redirect('/admin/ads')->with('success', '修改成功');
            }else{
                return back()->with('error', '内容未修改');
            }
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
        $data = DB::table('ads')->where('id',$id)->first();
        $res = DB::table('ads')->where('id',$id)->delete();
        if($res){
            $image = $data->image;
            $path = '../public/uploads/'.$image;
            unlink($path);
            return redirect('/admin/ads')->with('success', '删除成功');
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
                $file_name = $request->file('image')->store('ads');
                $arr = [
                    'msg'=>'success',
                    'path'=>$file_name,
                ];
            }else{
                $arr = [
                    'msg'=>'errors',
                    'path'=>'',
                ];
            }
        return json_encode($arr);
    }
    public function del(Request $request)
    {
        $data= $request->input('delid');
        $str = explode( ',',$data);
        $i=0;
        foreach($str as $k=>$v){
            if($v!=''){
                $select = DB::table('ads')->where('id',$v)->first();
                $image = $select->image;
                $path = '../public/uploads/'.$image;
                unlink($path);
                $del=DB::table('ads')->where('id',$v)->delete();
                $i++;
            }
        }
        $message = '批量删除'.$i.'条';
        return back()->with('success', "$message");
    }
    public function put($id)
    {
        $num = DB::table('ads')->where('put','>',0)->count();
        $ads = DB::table('ads')->where('id',$id)->first();
        if($ads->put == 0){
            if($num > 2){
                return back()->with('error', '广告最多投放三条');
            }else{
                $res = DB::table('ads')->where('id',$id)->update(['put'=>1]);
                    if($res){
                        return redirect('/admin/ads')->with('success', '投放成功');
                    }else{
                        return back()->with('error', '投放失败请刷新重新置顶');
                    }
            }
        }else{
            $res = DB::table('ads')->where('id',$id)->update(['put'=>0]);
            if($res){
                return redirect('/admin/ads')->with('success', '下架成功');
            }else{
                return back()->with('error', '下架失败请刷新重新置顶');
            }
        }
    }
    public function top($id)
    {
        $num = DB::table('ads')->where('put',2)->count();
        $ads = DB::table('ads')->where('id',$id)->first();
        if($ads->put == 1){
            if($num > 0){
                $top = DB::table('ads')->where('put',2)->first();
                $res = DB::table('ads')->where('id',$top->id)->update(['put'=>1]);
                if($res){
                    $bool = DB::table('ads')->where('id',$id)->update(['put'=>2]);
                    if($bool){
                        return redirect('/admin/ads')->with('success', '置顶成功');
                    }else{
                        return back()->with('error', '置顶失败请刷新重新置顶');
                    }
                }else{
                    return back()->with('error', '置顶失败请刷新重新置顶');
                }

            }else{
                $res = DB::table('ads')->where('id',$id)->update(['put'=>2]);
                if($res){
                    return redirect('/admin/ads')->with('success', '置顶成功');
                }else{
                    return back()->with('error', '置顶失败请刷新重新置顶');
                }
            }
        }else{
            $res = DB::table('ads')->where('id',$id)->update(['put'=>1]);
            if($res){
                return redirect('/admin/ads')->with('success', '取消置顶成功');
            }else{
                return back()->with('error', '取消置顶失败请刷新重新置顶');
            }
        }
    }


}
