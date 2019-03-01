<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class LinkController extends Controller
{
    public static function deldir(){
        $dh = opendir('../public/uploads/cache');
        while(($d = readdir($dh)) !== false){
            if($d == '.' || $d == '..'){
                continue;
            }
            $tmp = '../public/uploads/cache/'.$d;
            if(!is_dir($tmp)){
                unlink($tmp);
            }else{
                deldir($tmp);
            }
        }
        closedir($dh);
        rmdir('../public/uploads/cache');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search','');
    	$data = DB::table('links')->where('lname','like','%'.$search.'%')->orderBy('id','asc')->paginate(3);
        if($search == ''){
            $select = DB::table('links')->get();
            $num = count($select);
        }else{
            $num = count($data);
        }
        return view('admin.Link.index',['data'=>$data,'request'=> $request->all(),'num'=>$num]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Link.add');
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
            'lname' => 'required',
            'url'=>['required','regex:/^((https|http|ftp|rtsp|mms)?:\/\/)[^\s]+/'],
            'image' => 'required',
            'status' => 'required',
        ],[
            'lname.required'=>'友情链接名必填',
            'url.required'=>'友情地址必填',
            'url.regex'=>'友情地址有误(请填写类似https:// http:// ftp:// rtsp:// mms://)',
            'image.required'=>'友情链接图片必填',
            'status.required'=>'显示必填',
        ]);

        $data = $request->except('_token');
        $file = '../public/uploads/'.$data['image'];
        $image =  explode("/",$data['image']);
        $newfile = '../public/uploads/links/'.$image[1];
        if(!copy($file,$newfile)){
            return back()->with('error', '添加失败,请刷新后重新添加');
        }
        $data['image'] = 'links/'.$image[1];
        $res = DB::table('links')->insert($data);
        self::deldir();
        if($res){
            return redirect('/admin/link')->with('success', '添加成功');
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
        $show = DB::table('links')->where('id',$id)->first();
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
        $data = DB::table('links')->where('id',$id)->first();

        return view('admin.Link.edit',['data'=>$data]);

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
            'lname' => 'required',
            'url'=>['required','regex:/^((https|http|ftp|rtsp|mms)?:\/\/)[^\s]+/'],
            'status' => 'required',
        ],[
            'lname.required'=>'友情链接名必填',
            'url.required'=>'友情地址必填',
            'url.regex'=>'友情地址有误(请填写类似https:// http:// ftp:// rtsp:// mms://)',
            'status.required'=>'显示必填',
        ]);
        $data = $request->except('_token','_method');
        $arr = DB::table('links')->where('id',$id)->first();//获取原图片信息
        if($arr->image == $data['image'] )
        {
            $res = DB::table('links')->where('id',$id)->update($data);
            if($res){
                return redirect('/admin/link')->with('success', '修改成功');
            }else{
                return back()->with('error', '内容未修改');
            }
        }else{
            $file = '../public/uploads/'.$data['image'];
            $image =  explode("/",$data['image']);
            $newfile = '../public/uploads/links/'.$image[1];
            if(!copy($file,$newfile)){
                return back()->with('error', '添加失败,请刷新后重新添加');
            }
            $data['image'] = 'links/'.$image[1];
            //删除原来的图片
            $images = $arr->image;
            $path = '../public/uploads/'.$images;
            unlink($path);
            $res = DB::table('links')->where('id',$id)->update($data);
            self::deldir();
            if($res){
                return redirect('/admin/link')->with('success', '修改成功');
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

        $data = DB::table('links')->where('id',$id)->first();
        $res = DB::table('links')->where('id',$id)->delete();
        if($res){
            $image = $data->image;
            $path = '../public/uploads/'.$image;
            unlink($path);
            return redirect('/admin/link')->with('success', '删除成功');
        }else{
            return back()->with('error', '删除未成功');
        }
    }

    public function del(Request $request)
    {
        $data= $request->input('delid');
        $str = explode( ',',$data);
        $i=0;
        foreach($str as $k=>$v){
            if($v!=''){
                $select = DB::table('links')->where('id',$v)->first();
                $image = $select->image;
                $path = '../public/uploads/'.$image;
                unlink($path);
                $del=DB::table('links')->where('id',$v)->delete();
                $i++;
            }
        }
        $message = '批量删除'.$i.'条';
        return back()->with('success', "$message");
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
                $file_name = $request->file('image')->store('cache');
                $arr = [
                    'msg'=>'success',
                    'path'=>$file_name,
                ];
            }else{
                $arr = [
                    'msg'=>'errors',
                    'path'=>' ',
                ];
            }

        return json_encode($arr);
    }

    public function status($id,$status)
    {
        $data['status'] = $status;
        $res = DB::table('links')->where('id',$id)->update($data);
        if($res && $status==1 ){
            return redirect('/admin/link')->with('error', '审核已禁用');
        }elseif($res && $status==0 ){
            return redirect('/admin/link')->with('success', '审核已通过');
        }else{
            return back()->with('error', '修改失败请刷新重试');
        }
    }

}
