<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class PeizrController extends Controller
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
        $highpei = DB::table('games_recommend')->where('game_name','like','%'.$search.'%')->paginate(3);
        // dump($highpei);
        return view('admin.configure.highlist',['highpei'=>$highpei,'request'=> $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $games = DB::table('games')->select('name')->distinct('name')->get();
        // dump($games);
        return view('admin.configure.hightj',['games'=>$games]);
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
        $data = $request->except('_token');
        // dd($data);
        $res = DB::table('games_recommend')->insert($data);
        if($res){
            return redirect('admin/highpei')->with('success','添加成功');
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
        $hpeiz = DB::table('games_recommend')->where('id',$id)->first();
        return view('admin.configure.highxg',['hpeiz'=>$hpeiz]);
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
        $high = $request->except('_token','_method');
        $res = DB::table('games_recommend')->where('id',$id)->update($high);
        if($res){
            return redirect('/admin/highpei')->with('success','修改成功');
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
     *  配置的删除
     */
    public function shan($id)
    {
        $res = DB::table('games_recommend')->where('id',$id)->delete();
        if($res){
            return redirect('admin/highpei')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }

}
