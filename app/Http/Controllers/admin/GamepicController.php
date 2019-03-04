<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class GamepicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 游戏图片的展示
        $search = $request->input('search','');
        $tupian = DB::table('games_pic')->where('gname','like','%'.$search.'%')->orderBy('gname','asc')->paginate(5);
        return view('admin.game.gamepic',['tupian'=>$tupian,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $game_name = DB::table('games')->get();
        return view('admin.game.gamepictj',['game_name'=>$game_name]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->input('gid');
        
        $game_name = DB::table('games')->where('id',$id)->first();
        // dump($game_name->name);
        // 游戏图片的上传
        if($request->hasFile('game_pic')) {
            // 创建文件上传对象
            $file_a = $request->file('game_pic');
            foreach($file_a as $key=>$value){
                $file_img = $value->store('public');
                $data['game_pic'] = $file_img;
                $data['gname'] = $game_name->name;
                $res = DB::table('games_pic')->insert($data);
            }    
        } else {
            return back();
        }

        if($res){
            return redirect('/admin/gamepic')->with('success','添加成功');
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
    public function show($id)
    {
        //
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
        $gamexg = DB::table('games_pic')->where('id',$id)->first();
        return view('admin.game.gamepicxg',['gamexg'=>$gamexg]);
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
        // 修改游戏图片
        
        // 检查是否有文件上传
        if($request->hasFile('game_pic')) {
            // 创建文件上传对象
            $file = $request->file('game_pic');
            $file_pic = $file->store('public');
        } else {
            return back();
        }
        $data = $request->except('_token','_method');
        $data['game_pic'] = $file_pic;

        $img = DB::table('games_pic')->where('id',$id)->update($data);
        if($img){
            return redirect('/admin/gamepic')->with('success','修改成功');
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

    /**
     *  轮播图的删除
     */
    public function picdel($id)
    {
        $del = DB::table('games_pic')->delete($id);
        if($del){
            return redirect('/admin/gamepic')->with('success',"删除成功");
        }else{
            return back()->with('error','删除失败');
        }
    } 

}
