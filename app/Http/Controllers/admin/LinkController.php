<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class LinkController extends Controller
{
    /**
     *
     *@静态方法递归删除缓存文件
     *
     */
    public static function deldir(){
        $dh = opendir('./uploads/cache');
        while(($d = readdir($dh)) !== false){
            if($d == '.' || $d == '..'){
                continue;
            }
            $tmp = './uploads/cache/'.$d;
            if(!is_dir($tmp)){
                unlink($tmp);
            }else{
                deldir($tmp);
            }
        }
        closedir($dh);
    }

    /**
     * @主页面搜索
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //获取搜索栏内容
        $search = $request->input('search','');
        //查看友情链接
    	$data = DB::table('links')->where('lname','like','%'.$search.'%')->orderBy('id','asc')->paginate(3);
        //判断是否查询,统计数据
        if($search == ''){
            $select = DB::table('links')->get();
            $num = count($select);
        }else{
            $num = count($data);
        }
        //将查询到的数据返回页面
        return view('admin.link.index',['data'=>$data,'request'=> $request->all(),'num'=>$num]);
    }

    /**
     * @添加页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.link.add');
    }

    /**
     * @添加友情链接进数据库
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //判断数据的是否可添加
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
        //获取上传的数据并删除_token
        $data = $request->except('_token');
        //获取缓存文件夹里的图片相对路径
        $file = './uploads/cache/'.$data['image'];
        //获取用来存放友情链接图片的相对路径
        $newfile = './uploads/links/'.$data['image'];
        //判断是否有存放友情链接图片的文件夹
        if(!is_dir('./uploads/links')){
            //如果没有创建个文件夹
            mkdir('./uploads/links');
        }
        //将文件拷贝到存放友情链接的文件夹里
        if(!copy($file,$newfile)){
            return back()->with('error', '添加失败,请刷新后重新添加');
        }
        $data['image'] = 'links/'.$data['image'];
        //将新图片路径拼接到数据库里
        $res = DB::table('links')->insert($data);
        //调用自身静态方法递归删除文件夹里的垃圾图片
        self::deldir();
        if($res){
            return redirect('/admin/link')->with('success', '添加成功');
        }else{
            return back()->with('error', '添加失败');
        }
    }

    /**
     * @展示缩略图
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
     * @修改页面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('links')->where('id',$id)->first();

        return view('admin.link.edit',['data'=>$data]);

    }

    /**
     * @将修改的文件提交数据库
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //判断数据的是否可修改
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
        //获取上传的数据并删除_token _method
        $data = $request->except('_token','_method');
        //获取数据库里的图片信息
        $arr = DB::table('links')->where('id',$id)->first();
        //判断是否修改了图片
        if($arr->image == $data['image'] )
        {
            //图片未修改走这个方法
            $res = DB::table('links')->where('id',$id)->update($data);
            if($res){
                return redirect('/admin/link')->with('success', '修改成功');
            }else{
                return back()->with('error', '内容未修改');
            }
        }else{
            //获取缓存文件夹里的图片相对路径
            $file = './uploads/cache/'.$data['image'];
            //获取用来存放友情链接图片的相对路径
            $newfile = './uploads/links/'.$data['image'];
            //判断是否有存放友情链接图片的文件夹
            if(!is_dir('./uploads/links')){
                //如果没有创建个文件夹
                mkdir('./uploads/links');
            }
            //将文件拷贝到存放友情链接的文件夹里
            if(!copy($file,$newfile)){
                return back()->with('error', '添加失败,请刷新后重新添加');
            }
            //将新图片进行拼接
            $data['image'] = 'links/'.$data['image'];
            //将修改前图片路径
            $path = './uploads/'.$arr->image;
            //删除原图片
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
     * @删除数据库里的友情链接
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //获取原图片信息
        $data = DB::table('links')->where('id',$id)->first();
        $res = DB::table('links')->where('id',$id)->delete();
        if($res){
            //拼接原图片的路径
            $path = './uploads/'.$data->image;
            //删除原图片
            unlink($path);
            return redirect('/admin/link')->with('success', '删除成功');
        }else{
            return back()->with('error', '删除未成功');
        }
    }

    /**
     *
     *@批量删除
     *
     */
    public function del(Request $request)
    {
        //获取传输过来的批量删除的id
        $data= $request->input('delid');
        //把字符串的id拼接成数组
        $str = explode( ',',$data);
        //设置一个变量来计算删除多少个
        $i=0;
        //遍历删除数据
        foreach($str as $k=>$v){
            if($v!=''){
                //获取link的数据
                $link = DB::table('links')->where('id',$v)->first();
                //拼接原图片的路径
                $path = './uploads/'.$link->image;
                //删除原图片
                unlink($path);
                //删除数据
                $del=DB::table('links')->where('id',$v)->delete();
                $i++;
            }
        }
        $message = '批量删除'.$i.'条';
        return back()->with('success', "$message");
    }

    /**
     *
     *@图片上传
     *
     */
    public function upload(Request $request)
    {
        //判断原文件是否能被存储
        if($request->hasFile('image'))
            {
                //获取文件名
                $name=$request->file('image');
                //获取文件后缀名
                $ext=$name->extension();
                $exts = ['jpg','jpeg','png','gif','JPG','JPEG','PNG','GIF'];
                //判断文件是否是图片的后缀
                if(!in_array($ext,$exts)){
                    $arr = [
                        'msg'=>'error',
                        'path'=>' ',
                    ];
                }else{
                    //拼接图片名
                    $image_name=time().rand('1','9').'.'.$ext;
                    //将图片存储到缓存文件夹
                    $name->storeAs('cache',$image_name);
                    $arr = [
                        'msg'=>'success',
                        'path'=>$image_name,
                    ];
                }
            }else{
                $arr = [
                    'msg'=>'errors',
                    'path'=>' ',
                ];
            }

        return json_encode($arr);
    }

    /**
     *
     *@改变状态
     *
     */
    public function status($id,$status)
    {
        //将传过来的状态赋给变量
        $data['status'] = $status;
        //修改状态
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

