<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class WallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $search = $request->input('search','');
        $wall = DB::table('wallpaper')->where('gname','like','%'.$search.'%')->paginate(5);
        return view('admin.wallpaper.wallpaperlb',['wall'=>$wall,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.wallpaper.wallpapertj');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if($request->hasFile('game_img')){
            $file = $request->file('game_img');
            $file_name = $file->store('public');
        } else {
            return back();
        }

        $data['game_img'] = $file_name;
        $data['gname'] = $request->input('gname');
        $res = DB::table('wallpaper')->insert($data);
        if($res){
            return redirect('admin/wall')->with('success','添加成功');
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
        $wall = DB::table('wallpaper')->where('id',$id)->first();
        return view('admin.wallpaper.wallpaperxg',['wall'=>$wall]);
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
        if($request->hasFile('game_img')){
            $file = $request->file('game_img');
            $file_name = $file->store('public');
        }else{
            return back();
        }

        $data['game_img'] = $file_name;
        $data['gname'] = $request->input('gname');
        $res = DB::table('wallpaper')->where('id',$id)->update($data);
        if($res){
            return redirect('admin/wall')->with('success','修改成功');
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        // dump($id);
        $res = DB::table('wallpaper')->where('id',$id)->delete();
        if($res){
            return redirect('admin/wall')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
