<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Games;
use App\Models\Admin\Cates;
use App\Models\Admin\Gamecates;
use DB;

class GamexqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // 游戏详情
        // dump($id);
        $gameslist = Games::find($id);
        $tuname = $gameslist->name;
        // 前台图片的遍历
        $game_img = DB::table('games_img')->where('gname',$tuname)->get();
        $game_pic = DB::table('games_pic')->where('gname',$tuname)->get();
        $game_peiz = DB::table('games_recommend')->where('game_name',$tuname)->get();
        // 前台标签页遍历
        $xinpin = Cates::where('name','新品')->first();
        $xin_game = Cates::find($xinpin->id)->games()->orderBy('id','desc')->limit(2)->get();
        $cuxiao = Cates::where('name','促销')->first();
        $cu_game = Cates::find($cuxiao->id)->games()->orderBy('id','desc')->limit(2)->get();
        $yushou = Cates::where('name','预售')->first();
        $yu_game = Cates::find($yushou->id)->games()->orderBy('id','desc')->limit(4)->get();
        $rexiao = Cates::where('name','热销')->first();
        $re_game = Cates::find($rexiao->id)->games()->orderBy('id','desc')->limit(6)->get();

        // 查询有时是否买过

        return view('Home.gamesdetail',['gameslist'=>$gameslist,'game_img'=>$game_img,'game_pic'=>$game_pic,'game_peiz'=>$game_peiz,'xin_game'=>$xin_game,'cu_game'=>$cu_game,'yu_game'=>$yu_game,'re_game'=>$re_game]);
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
}
