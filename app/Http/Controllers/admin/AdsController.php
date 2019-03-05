<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class AdsController extends Controller
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
        //查看ads广告表
        $data = DB::table('ads')->where('gname','like','%'.$search.'%')->orderBy('put','desc')->paginate(3);
        //判断是否查询,统计数据
        if($search == ''){
            $num = DB::table('ads')->count();
        }else{
            $num = DB::table('ads')->where('gname','like','%'.$search.'%')->count();
        }
        //将查询到的数据返回页面
        return view('admin.ads.index',['data'=>$data,'request'=> $request->all(),'num'=>$num]);
    }

    /**
     * @添加页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ads.add');
    }

    /**
     * @添加广告进数据库
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //判断数据的是否可添加
        $this->validate($request, [
            'gname' => 'required',
            'title'=>'required',
            'image' => 'required',
        ],[
            'gname.required'=>'游戏名必填',
            'title.required'=>'广告标题必填',
            'image.required'=>'广告图片必填',

        ]);
        //获取上传的数据并删除_token
        $data = $request->except('_token');
        //获取缓存文件夹里的图片相对路径
        $file = './uploads/cache/'.$data['image'];
        //获取用来存放广告图片的相对路径
        $newfile = './uploads/ads/'.$data['image'];
        //判断是否有存放广告图片的文件夹
        if(!is_dir('./uploads/ads')){
            //如果没有创建个文件夹
            mkdir('./uploads/ads');
        }
        //将文件拷贝到存放广告的文件夹里
        if(!copy($file,$newfile)){
            return back()->with('error', '添加失败,请刷新后重新添加');
        }
        //将新图片路径拼接到数据库里
        $data['image'] = 'ads/'.$data['image'];
        $res = DB::table('ads')->insert($data);
        //调用自身静态方法递归删除文件夹里的垃圾图片
        self::deldir();
        if($res){
            return redirect('/admin/ads')->with('success', '添加成功');
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
        $show = DB::table('ads')->where('id',$id)->first();
        $path = "/uploads/".$show->image;
        echo '<img src="'.$path.'"style="width:640px;height:540px;">';
    }

    /**
     * @修改页面
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
            'gname' => 'required',
            'title'=>'required',
        ],[
            'gname.required'=>'游戏名必填',
            'title.required'=>'广告标题必填',
        ]);
        //获取上传的数据并删除_token _method
        $data = $request->except('_token','_method');
        //获取数据库里的图片信息
        $arr = DB::table('ads')->where('id',$id)->first();
        //判断是否修改了图片
        if($arr->image ==  $data['image'])
        {
            //图片未修改走这个方法
            $res = DB::table('ads')->where('id',$id)->update($data);
            if($res){
                return redirect('/admin/ads')->with('success', '修改成功');
            }else{
                return back()->with('error', '内容未修改');
            }
        }else{
            //获取缓存文件夹里的图片相对路径
            $file = './uploads/cache/'.$data['image'];
            //获取用来存放广告图片的相对路径
            $newfile = './uploads/ads/'.$data['image'];
            //判断是否有存放广告图片的文件夹
            if(!is_dir('./uploads/ads')){
                //如果没有创建个文件夹
                mkdir('./uploads/ads');
            }
            //将文件拷贝到存放广告的文件夹里
            if(!copy($file,$newfile)){
                return back()->with('error', '添加失败,请刷新后重新添加');
            }
            //将新图片进行拼接
            $data['image'] = 'ads/'.$data['image'];
            //将修改前图片路径
            $path = './uploads/'.$arr->image;
            //删除原图片
            unlink($path);
            $res = DB::table('ads')->where('id',$id)->update($data);
            self::deldir();
            if($res){
                return redirect('/admin/ads')->with('success', '修改成功');
            }else{
                return back()->with('error', '内容未修改');
            }
        }
    }

    /**
     * @删除数据库里的广告
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //获取原图片信息
        $data = DB::table('ads')->where('id',$id)->first();
        $res = DB::table('ads')->where('id',$id)->delete();
        if($res){
            //拼接原图片的路径
            $path = './uploads/'.$data->image;
            //删除原图片
            unlink($path);
            return redirect('/admin/ads')->with('success', '删除成功');
        }else{
            return back()->with('error', '删除未成功');
        }
    }

    /**
     *
     *@批量删除
     *
     */
    public function dels(Request $request)
    {
        //获取传输过来的批量删除的id
        $data= $request->input('delid');
        //把字符串的id拼接成数组
        $str = explode( ',',$data);
        //设置一个变量来计算删除多少条
        $i=0;
        //遍历删除数据
        foreach($str as $k=>$v){
            if($v!=''){
                //获取ads的数据
                $ads = DB::table('ads')->where('id',$v)->first();
                //拼接原图片的路径
                $path = './uploads/'.$ads->image;
                //删除原图片
                unlink($path);
                //删除数据
                $del=DB::table('ads')->where('id',$v)->delete();
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
     *投放广告和取消投放广告
     *
     */
    public function put($id)
    {
        //查询置顶和投放广告的数量
        $num = DB::table('ads')->where('put','>',0)->count();
        //查询该广告的数据
        $ads = DB::table('ads')->where('id',$id)->first();
        //判断该广告的是否未投放
        if($ads->put == 0){
            //判断是否投放超过3条
            if($num > 2){
                return back()->with('error', '广告最多投放三条');
            }else{
                //没超过3条将进行投放
                $res = DB::table('ads')->where('id',$id)->update(['put'=>1]);
                    if($res){
                        return redirect('/admin/ads')->with('success', '投放成功');
                    }else{
                        return back()->with('error', '投放失败请刷新重新置顶');
                    }
            }
        }else{
            //将投放的广告进行下架
            $res = DB::table('ads')->where('id',$id)->update(['put'=>0]);
            if($res){
                return redirect('/admin/ads')->with('success', '下架成功');
            }else{
                return back()->with('error', '下架失败请刷新重新置顶');
            }
        }
    }

    /**
     *
     *置顶广告和下架广告
     *
     */
    public function top($id)
    {
        //查询该广告的数据
        $ads = DB::table('ads')->where('id',$id)->first();
        //判断该广告的是否未投放
        if($ads->put == 1){
            //将置顶的广告数据获取
            $top = DB::table('ads')->where('put',2)->first();
            //判断是否有置顶的广告
            if($top){
                //把置顶广告取消置顶
                $res = DB::table('ads')->where('id',$top->id)->update(['put'=>1]);
            }
            $res = DB::table('ads')->where('id',$id)->update(['put'=>2]);
            if($res){
                    return redirect('/admin/ads')->with('success', '置顶成功');
                }else{
                    return back()->with('error', '置顶失败请刷新重新置顶');
                }
        }else{
            //取消置顶
            $res = DB::table('ads')->where('id',$id)->update(['put'=>1]);
            if($res){
                return redirect('/admin/ads')->with('success', '取消置顶成功');
            }else{
                return back()->with('error', '取消置顶失败请刷新重新置顶');
            }
        }
    }
}
