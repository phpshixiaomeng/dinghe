<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class GrxxController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $name=session('name');
        $data=DB::table('home_users')->where('name','=',$name)->first();
        // $games=DB::table('games')->get();
        $game=DB::table('game_shoucang')->where('uname',$name)->paginate(3);
        $game2=DB::table('game_shoucang')->where('uname',$name)->get();

        // dd($name);


        $data2=DB::table('users_details')->where('user_id','=',$data->id)->first();
        // dd($data2);
        // if($data2==null){
        //     $data2='';
        // }
        return view('home/grxx',['vip'=>($data->user_vip),'id'=>($data->id),'data2'=>$data2,'game'=>$game,'i'=>1,'game2'=>$game2]);
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
        // var_dump($_POST);
        // echo $_POST['file'];
        // echo $_POST['nickname'];








    //     if($res){
    //     $file = $request->file('file');
    //     $ext = $file->extension();
    //     // 拼接名称
    //     $file_name = time()+rand(1000,9999).'.'.$ext;
    //     $re = $file->storeAs('public',$file_name);
    //     unset($_POST['file']);
    //     $_POST['pic']=$file_name;
    //     $ares=DB::table('users_details')->where('user_id','=',$_POST['user_id'])->update($_POST);
    //     echo $ares;
    // }else{
            // echo 1111;
        // echo '111';
        // echo $_POST['user_id'];

        // var_dump($_POST);
        // exit;
        $bres=DB::table('users_details')->where('user_id','=',$_POST['user_id'])->update($_POST);
        echo $bres;


        // echo 111;
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


    public function gaimima(Request $request)
    {
        if(!session_id()) session_start();
        $ps=md5($_POST['password']);
        $nps=md5($_POST['npassword']);
        if($ps==$_SESSION['password']){
        DB::table('home_users')->where('name',$_SESSION['name'])->update(['password'=>$nps]);
        echo 1;
        unset($_SESSION);
        session_destroy();
        }else{
            echo 3;
        }


    }



    public function upload(Request $request){
            $type = $_FILES['image']['name'];
        $ext = strrchr($type,'.');
        $img = ['.jpg','.jpeg','.png','.gif','.JPG','.JPEG','.PNG','.GIF'];
        if(!in_array($ext,$img)){
            $arr = [
                'msg'=>'error',
                'path'=>' ',
            ];
        }elseif($request->hasFile('image'))
            {
                $name=$request->file('image');
                $zname=$name->extension();
                $fname=time()+rand('111','999').'.'.$zname;
                $file_name = $name->storeAs('grxx',$fname);
                $arr = [
                    'msg'=>'success',
                    'path'=>'grxx/'.$fname,
                ];
            }else{
                $arr = [
                    'msg'=>'errors',
                    'path'=>' ',
                ];
            }
            return json_encode($arr);
    }



}
