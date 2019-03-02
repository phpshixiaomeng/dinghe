<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Admin\Cates;
use App\Models\Admin\Games;


class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public static function getGameshow()
    {
        $games = DB::table('games')->paginate(9);
        return $games;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search','');
        $games = DB::table('games')->where('name','like','%'.$search.'%')->paginate(9);
        $cates_type = Cates::where('path','0,2')->get();
        $cates_flat = Cates::where('path','0,5')->get();
        return view('Home/games',['games'=>$games,'cates_type'=>$cates_type,'cates_flat'=>$cates_flat]);
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
    public function show($id)
    {
        $cates_lian = Cates::find($id);
        $cgame = $cates_lian->games;
        
        // 根据点击的游戏选择类型
        $cates_type = Cates::where('path','0,2')->get();
        $cates_flat = Cates::where('path','0,5')->get();
        // dump($cates);
        return view('Home/games',['games'=>self::getGameshow(),'cates_type'=>$cates_type,'cates_flat'=>$cates_flat,'id'=>$id,'cgame'=>$cgame]);
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
