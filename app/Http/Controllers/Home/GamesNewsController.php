<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $fire=(DB::table('news')->where('id',$id)->first()->fire)+1;
        DB::table('news')->where('id',$id)->update(['fire'=>$fire]);
        $pl=DB::table('news_pls')->where('gid',$id)->paginate(3);
        $data=DB::table('news_cs')->where('gid',$id)->first();
        return view('Home/gamesnews',['data'=>$data,'pls'=>$pl,'image'=>$image,'title'=>$title,'count'=>$pcount]);
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

        $zan=(DB::table('news_pls')->where('id',$id)->first()->pzan)+1;
        $res=DB::table('news_pls')->where('id',$id)->update(['pzan'=>$zan]);
        if($res){
            echo $zan;
        }
    }

    public function cai($id){
        $cai=(DB::table('news_pls')->where('id',$id)->first()->pcai)+1;
        $res=DB::table('news_pls')->where('id',$id)->update(['pcai'=>$cai]);
        if($res){
            echo $cai;
        }
    }
}
