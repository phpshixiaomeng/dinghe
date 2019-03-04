<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;


class GameimgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search','');
        // 游戏图片的展示
        $tupian = DB::table('games_img')->where('gname','like','%'.$search.'%')->orderBy('gname','asc')->paginate(5);
        return view('admin.game.gameimg',['tupian'=>$tupian,'request'=>$request->all()]);
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
        return view('admin.game.gameimgtj',['game_name'=>$game_name]);
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
        if($request->hasFile('game_img')) {
            // 创建文件上传对象
            $file_a = $request->file('game_img');
            foreach($file_a as $key=>$value){
                $file_pic = $value->store('public');
                $data['game_pic'] = $file_pic;
                $data['gname'] = $game_name->name;
                $res = DB::table('games_pic')->insert($data);
            }    
        } else {
            return back();
        }

        if($res){
            return redirect('/admin/gameimg')->with('success','添加成功');
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
        $gamexg = DB::table('games_img')->where('id',$id)->first();
        return view('admin.game.gameimgxg',['gamexg'=>$gamexg]);
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
        if($request->hasFile('game_img')) {
            // 创建文件上传对象
            $file = $request->file('game_img');
            $file_name = $file->store('public');
        } else {
            return back();
        }
        $data = $request->except('_token','_method');
        $data['game_img'] = $file_name;

        $img = DB::table('games_img')->where('id',$id)->update($data);
        if($img){
            return redirect('admin/gameimg')->with('success','修改成功');
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
     *  游戏详情图片的删除
     */
    public function imgdel($id)
    {
        // dump($id);
        $res = DB::table('games_img')->delete($id);
        if($res){
            return redirect('/admin/gameimg')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
