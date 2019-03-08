<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Games;
use App\Models\Admin\Homeusers;
use DB;

class ZhifuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('Home/zhifu');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {   
        //
        if(!$request->session()->has('name')){
            return redirect('/home/login');
        }
        // 支付界面的游戏详情根据新添加的游戏进行显示
        $gameslist = Games::find($id);
        $tuname = $gameslist->name;
        $game_img = DB::table('games_img')->where('gname',$tuname)->get();
        $game_pic = DB::table('games_pic')->where('gname',$tuname)->get();

        $yongyou = DB::table('carts')->where('game_id',$id)->first();
        if(empty($yongyou)){
            $data['user_id'] = $request->session()->get('id');
            $data['game_id'] = $gameslist->id;
            $res = DB::table('carts')->insert($data);
            if(empty($res)){
                return back()->whith('error','购买失败');
            }
        }

        // 购物车页面的遍历
        $user_id = $request->session()->get('id');
        $shop = Homeusers::find($user_id)->gameslist()->get();
        // dump($shop);
        return view('Home/zhifu',['gameslist'=>$gameslist,'game_img'=>$game_img,'game_pic'=>$game_pic,'shop'=>$shop]);
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

    public function zhifu(Request $request, $id)
    {
        // echo $id;
        $user_id = $request->session()->get('id');
        $game_id = $id;
        $res = DB::table('carts')->where('user_id',$user_id)->where('game_id',$game_id)->delete();
        $game = DB::table('games')->where('id',$id)->first();
        if(!empty($res)){
              $arr = [
                    'msg'=>'yes',
                    'qian'=>$game->game_jg,
                ];
        }else{
            echo 0;
        }
        return json_encode($arr);
    }

    public function heji(Request $request, $id)
    {
        $game = DB::table('games')->where('id',$id)->first();
        return $game->game_jg;
    }

    public function xuan($id)
    {
        // echo $id;
        $user_id = session('id'); 
       // $game_id = $id;
        $games = Homeusers::find($user_id)->gameslist()->get();
       // return json_encode($games);
        $arr = array();
        foreach($games as $key=>$value){
            $arr[] = $value->game_jg;
        }
       return json_encode($arr);

    }

    public function jia(Request $request, $id)
    {
        $uid = session('id');
        $dd = DB::table('cache')->where('uid',$uid)->where('gid',$id)->first();
        if(empty($dd)){
            // return $id;
            $data['uid'] = $request->session()->get('id');
            $data['gid'] = $id;
            $res = DB::table('cache')->insert($data);
        }     
    }

    public function jian($id)
    {
        $uid = session('id');
        $gid = $id;
        DB::table('cache')->where('uid',$uid)->where('gid',$gid)->delete();
    }

    public function sx()
    {
        $uid = session('id');
        DB::table('cache')->where('uid',$uid)->delete();
    }


}
