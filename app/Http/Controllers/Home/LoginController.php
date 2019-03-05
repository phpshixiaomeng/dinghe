<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Home\login');
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
<<<<<<< HEAD

        // echo $_POST['name'];
    //用户登录验证
    // echo 1111;
    // exit;

    $_POST['password']=md5($_POST['password']);
=======
        $_POST['password']=md5($_POST['password']);
>>>>>>> origin/weishao

        $res=DB::table('home_users')->where($_POST)->first();
    if($res){
<<<<<<< HEAD
    if(($res->status)==0){

        // session(['key'=>'1']);

    session(['name'=>$_POST['name']]);

        echo 1;

        }else{
        echo 3;
        }
        }else{
        echo 2;
    }
=======
        if(($res->status)==0){
            session(['name'=>$res->name]);
            echo 1;
        }else{
                echo 3;
        }
        }else{
                echo 2;
            }
>>>>>>> origin/weishao
    // exit;




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
<<<<<<< HEAD
        // echo 11111;





=======

        unset($_SESSION);
        session_destroy();
>>>>>>> origin/weishao
        return redirect("home");
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
