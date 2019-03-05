<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home\Cates;
use DB;
class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    public static function  getGameCates()
    {

        $game_nav = DB::table('cates')->where('name','类型')->first();
        if($game_nav){
            $game_child = Cates::where('pid',$game_nav->id)->get();
            return $game_child;
        }else{
            $game_child = null;
            return $game_child;
        }
    }
    public static function  ads()
    {
        $ads = DB::table('ads')->where('put','>','0')->orderBy('put','desc')->get();
        return $ads;
    }
    public static function  link()
    {
        $links = DB::table('links')->paginate(3);
        return $links;
    }

    public static function  webSite()
    {
        $game_nav = DB::table('websites')->where('status','1')->first();

        return $game_nav;
    }
    public function index()
    {
        $num=DB::table('lunbotus')->where('status',1)->count();
        $data=DB::table('lunbotus')->where('status',1)->get();




        return view('Home/index',['num'=>$num,'data'=>$data,'i'=>1]);

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
