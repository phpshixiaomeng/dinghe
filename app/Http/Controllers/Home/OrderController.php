<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Admin\Homeusers;
use App\Models\Admin\Games;
use App\Models\Admin\Orders;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $s_id = session('gid');
        $id = session('id');

        $rem = DB::table('cache')->first();
        // dd($rem);
        if(!empty($rem)){
            $sum = 0;
            $yx = Homeusers::find($id)->price()->get();
            foreach($yx as $k=>$v){
                $sum += $v->game_jg;
            }
            $yh = $sum*0.1;
            $zj = $sum*0.9;
        
            // 订单表的添加
            $data['order_num'] = time()+rand(1000,9999);
            $data['user_id'] = $id;
            $data['order_amount'] = $zj;
            $data['order_type'] = 0;
            $data['order_status'] = 0;
            $data['order_time'] = time();
            $res = DB::table('orders')->insertGetId($data);
            $orderid['order_id'] = $res;
            DB::table('games_replys')->insert($orderid);
            // dump($res);
            $games = Homeusers::find($id)->price()->get();
            foreach($games as $kk=>$vv){
                $arr['order_id'] = $res;
                $arr['game_id'] = $vv->id;
                $game_id = $vv->id;
                $success = DB::table('order_details')->insert($arr);
                DB::table('cache')->where('uid',$id)->delete();
                DB::table('carts')->where('user_id',$id)->where('game_id',$vv->id)->delete();
            }
        }
        // 全选
       if(!empty($s_id)){
            foreach($s_id as $la=>$xi){
                // dd($xi);
                $game_nan = DB::table('carts')->where('game_id',$xi)->where('user_id',$id)->first();
                $sum = 0;
                $yx = Homeusers::find($id)->cartgame()->get();
                foreach($yx as $k=>$v){
                    $sum += $v->game_jg;
                }
                    $yh = $sum*0.1;
                    $zj = $sum*0.9;
                }
                // 订单表的添加
                $data['order_num'] = time()+rand(1000,9999);
                $data['user_id'] = $id;
                $data['order_amount'] = $zj;
                $data['order_type'] = 0;
                $data['order_status'] = 0;
                $data['order_time'] = time();
                $res = DB::table('orders')->insertGetId($data);
                // dump($res);
                
                $games = Homeusers::find($id)->cartgame()->get(); 
                // dd($games);
                foreach($games as $kk=>$vv){
                    $arr['order_id'] = $res;
                    $arr['game_id'] = $vv->id;
                    $orderid['game_id'] = $vv->id;
                    $orderid['user_id'] = $id;                
                    $orderid['order_id'] = $res;
                    DB::table('games_replys')->insert($orderid);
                    $game_id = $vv->id;                
                    $success = DB::table('order_details')->insert($arr);
                    DB::table('carts')->where('user_id',$id)->where('game_id',$vv->id)->delete();
                    $request->session()->forget('gid');
                }
            
             
        }
        // 订单表前台的遍历
        $order = DB::table('orders')->where('user_id',$id)->get();
        return view('Home.order',['order'=>$order]);
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

    public function display($id)
    {
        // dump($id);
        $games = Orders::find($id)->gameorder()->get();
        return view('Home.orderzhans',['games'=>$games]);
    }

}
