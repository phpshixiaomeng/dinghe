<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class TotalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //
        $res = DB::table('web_totals')->where('id',1)->first();
        $a = DB::table('games')->select('name')->count();
        $b = DB::table('home_users')->select('id')->count();
        $c = DB::table('home_users')->select('user_vip')->get();
        $d = 0;
        foreach($c as $k=>$v){
            $d += $v->user_vip;  
        }
        $e = DB::table('orders')->select('id')->count();
        $f = DB::table('orders')->select('order_amount')->get();
        $g = 0;
        foreach($f as $kk=>$vv){
            $g += $vv->order_amount;
        }

        return view('admin.totals.totals',['res'=>$res,'a'=>$a,'b'=>$b,'c'=>$c,'d'=>$d,'e'=>$e,'g'=>$g]);
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
