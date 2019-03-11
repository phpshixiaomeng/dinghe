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
        $star5=DB::table('news_pls_star')->where(['store'=>5,'news_id'=>$id])->count();
        $star4=DB::table('news_pls_star')->where(['store'=>4,'news_id'=>$id])->count();
        $star3=DB::table('news_pls_star')->where(['store'=>3,'news_id'=>$id])->count();
        $star2=DB::table('news_pls_star')->where(['store'=>2,'news_id'=>$id])->count();
        $star1=DB::table('news_pls_star')->where(['store'=>1,'news_id'=>$id])->count();
        $numstar=DB::table('news_pls_star')->where(['name'=>session('name'),'news_id'=>$id])->first();
        if(empty($numstar)){
        $numstar='';
        }
        $people=$star5+$star4+$star3+$star2+$star1;
        $zongfen=$star5*5+$star4*4+$star3*3+$star2*2+$star1*1;
        if($people!=0){
        $pingjun=round($zongfen/$people,1);
    }else{
        $pingjun=0;
    }
        $pcount=DB::table('news_pls')->where('gid',$id)->count();
        $image=DB::table('news')->where('id',$id)->first()->image;
        $title=DB::table('news')->where('id',$id)->first()->title;
        $gname=DB::table('news')->where('id',$id)->first()->gname;
        $fire=(DB::table('news')->where('id',$id)->first()->fire)+1;
        $tata=DB::table('news')->where('id',$id)->first();
        $xinpin = Cates::where('name','新品')->first();
        $tuijian = Cates::where('name','热销')->first();
        $xin_game = Cates::find($xinpin->id)->games()->orderBy('id','desc')->limit(3)->get();
        $tuijian_game = Cates::find($tuijian->id)->games()->orderBy('id','desc')->limit(2)->get();

        DB::table('news')->where('id',$id)->update(['fire'=>$fire]);
        $pl=DB::table('news_pls')->where('gid',$id)->paginate(3);
        $data=DB::table('news_cs')->where('gid',$id)->first();
        return view('Home/gamesnews',['tata'=>$tata,'data'=>$data,'gname'=>$gname,'pls'=>$pl,'image'=>$image,'title'=>$title,'count'=>$pcount,'xinpin'=>$xin_game,'tuijian'=>$tuijian_game,'id'=>$id,'star1'=>$star1,'star2'=>$star2,'star3'=>$star3,'star4'=>$star4,'star5'=>$star5,'pingjun'=>$pingjun,'people'=>$people,'zongfen'=>$zongfen,'numstar'=>$numstar]);
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


    public function star($id,$cid){
    $panduan=DB::table('news_pls_star')->where(['news_id'=>$id,'name'=>session('name')])->first();

    if(empty($panduan)){
        $res=DB::table('news_pls_star')->insert(['name'=>session('name'),'news_id'=>$id,'store'=>$cid]);
        if($res){
        echo $cid;
        }

    }else{
        echo 6;
    }



    }




}
