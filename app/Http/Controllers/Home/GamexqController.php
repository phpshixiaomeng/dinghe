<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Games;
use App\Models\Admin\Cates;
use App\Models\Admin\Gamecates;
use APP\Models\Admin\Homeusers;
use App\Models\Admin\Orders;
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
        $user_id = session('id');
        $ioo = DB::table('orders')->where('user_id',$user_id)->get();
        $ilike = null;
        foreach($ioo as $j=>$h){
            $ilike = Orders::find($h->id)->gameorder()->where('game_id',$id)->first();
        }
        
        // 前台游戏评论遍历
        $replys = DB::table('games_replys')->where('game_id',$id)->paginate(2);
        foreach($replys as $k=>$val){
            $reply[$k] = DB::table('games_replys')->where('game_id',$val->game_id)->first();
            $reply[$k]->zan = DB::table('zan_cais')->where('user_id',$val->user_id)->where('zan','1')->count();
            $reply[$k]->cai = DB::table('zan_cais')->where('user_id',$val->user_id)->where('cai','1')->count();
            $reply[$k]->nickname = DB::table('users_details')->where('user_id',$val->user_id)->select('nickname')->first();
        }
              
        // 评论总数
        $pl = DB::table('games_replys')->where('game_id',$id)->count();
        // 'sum'=>$sum,'count'=>$count,

        return view('Home.gamesdetail',['gameslist'=>$gameslist,'game_img'=>$game_img,'game_pic'=>$game_pic,'game_peiz'=>$game_peiz,'xin_game'=>$xin_game,'cu_game'=>$cu_game,'yu_game'=>$yu_game,'re_game'=>$re_game,'ilike'=>$ilike,'reply'=>$reply,'user_id'=>$user_id,'pl'=>$pl,'replys'=>$replys]);
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
        $user_id = session('id');
        if(!isset($user_id)){
            return redirect('/home/login');
        }
        // 评论的添加
        // dump($_POST);
        $reply['greply_reply'] = $request->only('greply_reply');
        $time['greply_time'] = time();
        $data = DB::table('games_replys')->where('user_id',$user_id)->where('game_id',$id)->first();
        if(empty($data->greply_reply)){
            $res = DB::table('games_replys')->where('user_id',$user_id)->where('game_id',$id)->update($reply['greply_reply']);
            $rem = DB::table('games_replys')->where('user_id',$user_id)->where('game_id',$id)->update($time);
            if($res){
                return redirect('/home/gamexq/'.$id);
            }else{
                return back();
            }
        }else{
            return redirect('home/gamexq/'.$id);
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
    public function zan($id)
    {
        // 评论顶
        $uid = session('id');
        if(!isset($uid)){
            return 3;
        }
        $reply = DB::table('games_replys')->where('id',$id)->first();
        $gid = $reply->game_id;
        $zz = DB::table('zan_cais')->where('greply_id',$id)->where('uid',$uid)->where('gid',$gid)->first();
        if(empty($zz)){
            $data['greply_id'] = $id;
            DB::table('zan_cais')->insert($data);        
            $arr['gid'] = $reply->game_id;
            $arr['uid'] = $uid;
            DB::table('zan_cais')->where('greply_id',$id)->update($arr); 
        }

        $ping = DB::table('zan_cais')->where('uid',$uid)->where('gid',$gid)->first();
        if(empty($ping->zan) && empty($ping->cai)){
            $msg['zan'] = $ping->zan + 1;
            DB::table('zan_cais')->where('uid',$uid)->where('gid',$gid)->update($msg);
            echo 1;
        }else{
            echo 2;
        }        
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cai($id)
    {
        // 评论踩
        $uid = session('id');
        if(!isset($uid)){
            return 3;
        }
        $reply = DB::table('games_replys')->where('id',$id)->first();
        $gid = $reply->game_id;
        $zz = DB::table('zan_cais')->where('greply_id',$id)->where('uid',$uid)->where('gid',$gid)->first();
        if(empty($zz)){
            $data['greply_id'] = $id;
            DB::table('zan_cais')->insert($data);        
            $arr['gid'] = $reply->game_id;
            $arr['uid'] = $uid;
            DB::table('zan_cais')->where('greply_id',$id)->update($arr); 
        }

        $ping = DB::table('zan_cais')->where('uid',$uid)->where('gid',$gid)->first();
        if(empty($ping->zan) && empty($ping->cai)){
            $msg['cai'] = $ping->cai + 1;
            DB::table('zan_cais')->where('uid',$uid)->where('gid',$gid)->update($msg);
            echo 1;
        }else{
            echo 2;
        }        
    }

}
