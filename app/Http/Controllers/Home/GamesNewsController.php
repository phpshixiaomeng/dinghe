<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Games;
use App\Models\Admin\Cates;
use App\Models\Admin\Gamecates;
use DB;
class GamesNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        // $nickname=DB::table('users_details')->where('user_id',$userid)->first()->nickname;
        $pcount=DB::table('news_pls')->where('gid',$id)->count();
        $image=DB::table('news')->where('id',$id)->first()->image;
        $title=DB::table('news')->where('id',$id)->first()->title;
        $gname=DB::table('news')->where('id',$id)->first()->gname;
        $fire=(DB::table('news')->where('id',$id)->first()->fire)+1;
        $tata=DB::table('news')->where('id',$id)->first();
        $xinpin = Cates::where('name','新品')->first();
        $tuijian = Cates::where('name','推荐')->first();
        $xin_game = Cates::find($xinpin->id)->games()->orderBy('id','desc')->limit(3)->get();
        $tuijian_game = Cates::find($tuijian->id)->games()->orderBy('id','desc')->limit(2)->get();

        DB::table('news')->where('id',$id)->update(['fire'=>$fire]);
        $pl=DB::table('news_pls')->where('gid',$id)->paginate(3);
        $data=DB::table('news_cs')->where('gid',$id)->first();
        return view('Home/gamesnews',['tata'=>$tata,'data'=>$data,'gname'=>$gname,'pls'=>$pl,'image'=>$image,'title'=>$title,'count'=>$pcount,'xinpin'=>$xin_game,'tuijian'=>$tuijian_game]);
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
        $userid=DB::table('home_users')->where('name',session('name'))->first()->id;
        $nickname=DB::table('users_details')->where('user_id',$userid)->first()->nickname;
        $data=$request->except('_token');
        $data['ptime']=date('Y-m-d H:i:s',time());
        $data['pname']=$nickname;
        $data['touxiang']=DB::table('users_details')->where('user_id',$userid)->first()->pic;
        // echo $data['pcontent'];
        $res=DB::table('news_pls')->insert($data);
        if($res){
            echo 1;
        }else{
            echo 2;
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

    public function zan($id){
        $data=DB::table('new_pls_zans')->where(['pl_id'=>$id,'zan_user'=>session('name')])->first();
        if(empty($data)){
        $zan=(DB::table('news_pls')->where('id',$id)->first()->pzan)+1;
        $res=DB::table('news_pls')->where('id',$id)->update(['pzan'=>$zan]);
        DB::table('new_pls_zans')->insert(['pl_id'=>$id,'zan_user'=>session('name')]);
        if($res){
            echo $zan;
        }
    }else{
        $buzan=DB::table('news_pls')->where('id',$id)->first()->pzan;
        echo $buzan;
    }
    }

    public function cai($id){
        $data=DB::table('new_pls_zans')->where(['pl_id'=>$id,'zan_user'=>session('name')])->first();
        if(empty($data)){
        $cai=(DB::table('news_pls')->where('id',$id)->first()->pcai)+1;
        $res=DB::table('news_pls')->where('id',$id)->update(['pcai'=>$cai]);
        DB::table('new_pls_zans')->insert(['pl_id'=>$id,'zan_user'=>session('name')]);
        if($res){
            echo $cai;
        }
    }else{
        $buzan=DB::table('news_pls')->where('id',$id)->first()->pcai;
        echo $buzan;
    }
    }
}
