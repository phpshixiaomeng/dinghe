<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Cates;
use App\Models\Admin\Games;
use DB;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 搜索加分页
        $search = $request->input('search','');
        $games_data = Games::where('name','like','%'.$search.'%')->select('*',DB::raw("concat(name,',',id) as paths"))->orderBy('paths','asc')->paginate(7);
        return view('Admin/game/gamelb',['games_data'=>$games_data,'request'=> $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 获取分类数据
        $cates_data = Cates::select('*',DB::raw("concat(path,',',id) as paths"))->orderBy('paths','asc')->get();
        // dump($cates_data);
        foreach($cates_data as $k=>$v){
            $n = substr_count($v->path,',');
            $cates_data[$k]->name = str_repeat('|----',$n).$v->name;
        }
        return view('Admin/game/gametj',['cates_data'=>$cates_data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        // 检查是否有文件上传
        if($request->hasFile('game_img')) {
            // 创建文件上传对象
            $file = $request->file('game_img');
            $file_name = $file->store('public');
        } else {
            return back();
        }
        $data = $request->except('_token');
        $data['game_img'] = $file_name;
        $res = DB::table('Games')->insert($data);
        if($res){
            return redirect('/admin/game')->with('success','添加成功');
        } else {
            return back()->with('error','添加失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function shan($id)
    {

        $res = Games::destroy($id);
        if($res){
            return redirect('admin/game')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
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
        $tk = Games::where('id',$id)->first();
        return $tk->game_xq;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 游戏的修改
        // dump($id);
        $games = Games::where('id',$id)->first();
        // dump($games->name);
        // 获取分类数据
        $cates_data = Cates::select('*',DB::raw("concat(path,',',id) as paths"))->orderBy('paths','asc')->get();
        // dump($cates_data);
        foreach($cates_data as $k=>$v){
            $n = substr_count($v->path,',');
            $cates_data[$k]->name = str_repeat('|----',$n).$v->name;
        }

        return view('Admin/game/gamexg',['cates_data'=>$cates_data,'games'=>$games]);
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
        $data = $request->except('_token','_method');
        $res = DB::table('games')->where('id',$id)->update($data);
        if($res){
            return redirect('admin/game')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
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
        //
    }
}
