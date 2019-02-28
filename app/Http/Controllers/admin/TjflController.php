<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Cates;
use DB;

class TjflController extends Controller
{
    /**
     * 
     */
    public static function getCates()
    {
        $cates_data = Cates::select('*',DB::raw("concat(path,',',id) as paths"))->orderBy('paths','asc')->paginate(7);
        foreach ($cates_data as $k=>$v) {
           $n = substr_count($v->path,',');
           $cates_data[$k]->name = str_repeat('|----',$n).$v->name;
        }

        return $cates_data;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search','');
        $cates_data = Cates::where('name','like','%'.$search.'%')->select('*',DB::raw("concat(path,',',id) as paths"))->orderBy('paths','asc')->paginate(7);
        foreach ($cates_data as $k=>$v) {
           $n = substr_count($v->path,',');
           $cates_data[$k]->name = str_repeat('|----',$n).$v->name;
        }
        
        return view('Admin/cates/fllb',['request'=> $request->all(),'cates_data'=>$cates_data]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = 0)
    {
        // dump($id);
        $cates_xinx = Cates::select('*',DB::raw("concat(path,',',id) as paths"))->orderBy('paths','asc')->get();
        foreach ($cates_xinx as $k=>$v) {
           $n = substr_count($v->path,',');
           $cates_xinx[$k]->name = str_repeat('|----',$n).$v->name;
        }
        // dump($cates_data);
        return view('Admin/cates/tjfl',['id'=>$id,'cates_data'=>self::getCates(),'cates_xinx'=>$cates_xinx]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 获取数据
        $data = $request->all();
        if($data['pid'] == 0){
            $data['path'] = 0;
        }else{
            // 获取分级分类的path ,pid
            
            // 获取父级分类的信息
            $parent_data = Cates::find($data['pid']);
            $data['path'] = $parent_data->path.','.$parent_data->id;
        }
            $cates = new Cates;
            $cates->name = $data['name'];
            $cates->pid = $data['pid'];
            $cates->path = $data['path'];
            // 执行添加
            if($cates->save()){
                return redirect('admin/tjfl')->with('success','添加成功');
            }else{
                return back()->with('error','添加失败');
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
        //
        $child_data = Cates::where('pid',$id)->first();
        if($child_data){
            return back()->with('error','该父类下有子类不可删除');
        }

        if(Cates::destroy($id)){
            return redirect('admin/tjfl')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
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

    /**
     *  前台是否显示分类
     */
    public function display($id)
    {
        // dump($id);
        $xianshi = Cates::find($id);
        $child = Cates::where('pid',$id)->get();
        if($xianshi->display == 0){
            $xianshi->display = 1;
            $xianshi->save();
            return redirect('admin/tjfl')->with('success','修改成功');
        }else{
            $xianshi->display = 0;
            $xianshi->save();
            return back()->with('error','修改失败');
        }
    }
}
