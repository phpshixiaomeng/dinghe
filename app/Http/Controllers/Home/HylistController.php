<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class HylistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

     $search = $request->input('search','');
        $data = DB::table('home_users')->where('name','like','%'.$search.'%')->orderBy('id','asc')->paginate(1);
        if($search == ''){
            $select = DB::table('home_users')->get();
            $num = count($select);
        }else{
            $num = count($data);
        }
        return view('admin.home_users.userlist',['user'=>$data,'request'=> $request->all(),'num'=>$num,'i'=>1]);
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
        $data=DB::table('users_details')->where('user_id',$id)->first();
        if($data){
        return view('admin/home_users/xiangqing',['data'=>$data]);
    }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if($id==0){
        DB::table('home_users')->where('id',$_GET['id'])->update(['status'=>1]);
        return back();
    }else{
        DB::table('home_users')->where('id',$_GET['id'])->update(['status'=>0]);
        return back();
    }
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
