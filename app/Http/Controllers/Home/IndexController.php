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
        // 网站访问量
        $id = session('id');
        $time = date('Y-m-d',time());
        $shijian = DB::table('web_totals')->where('web_time',$time)->first();
        $game = DB::table('games')->select('id')->count();
        $order = DB::table('orders')->get();
        foreach($order as $a=>$b){
            $order_time = date('Y-m-d',$b->order_time);
            $orders = DB::table('orders')->select('order_time',$order_time)->count(); 
        }
        $users = DB::table('home_users')->select('id')->count();
        $user_vip = DB::table('home_users')->select('user_vip')->get();
        $vip = 0;
        foreach($user_vip as $k=>$v){
            if($v->user_vip){
                $vip += $v->user_vip; 
            }else{
                $vip = 0;
            } 
        }
        
        $price = DB::table('orders')->select('order_amount')->get();
        $amount = 0; 
        foreach($price as $kk=>$vv){
            if($vv->order_amount){
                $amount += $vv->order_amount;
            }else{
                $amount = 0;
            }  
        }


        // dd($shijian);
        if(empty($shijian)){  
            $arr['web_time'] = date('Y-m-d',time());
            $res = DB::table('web_totals')->insert($arr);
        }

        if(!empty($shijian)){
            $arr['game_num'] = $game;
            $arr['order_total'] = $orders;
            $arr['users_total'] = $users;
            $arr['vip_total'] = $vip;
            $arr['money'] = $amount;
            $arr['web_volume'] = $shijian->web_volume + 1;
            DB::table('web_totals')->where('web_time',$time)->update($arr);
            }


        // 网站轮播图
        $num=DB::table('lunbotus')->where('status',1)->count();
        $data=DB::table('lunbotus')->where('status',1)->get();

        $gameimg = DB::table('games')->orderBy('id','desc')->limit(5)->get();
        return view('Home/index',['num'=>$num,'data'=>$data,'i'=>1,'gameimg'=>$gameimg]);
           
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
