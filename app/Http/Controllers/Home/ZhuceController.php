<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ZhuceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Home\register');
        // echo '1111';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


// echo $_GET['phone'];
// exit;

header('content-type:text/html;charset=utf-8');

$sendUrl = 'http://v.juhe.cn/sms/send'; //短信接口的URL
$yanzhengma=rand(1000,9999);
$smsConf = array(
    'key'   => '9504d89d999546993faea8f6649ed37c', //您申请的APPKEY
    'mobile'    =>$_GET['phone'], //接受短信的用户手机号码
    'tpl_id'    => '137798', //您申请的短信模板ID，根据实际情况修改
    'tpl_value' =>'#code#='.$yanzhengma.'&#company#=我爱你啊大宝' //您设置的模板变量，根据实际情况修改
);
//
function juhecurl($url,$params=false,$ispost=0){
    $httpInfo = array();
    $ch = curl_init();
    curl_setopt( $ch, CURLOPT_HTTP_VERSION , CURL_HTTP_VERSION_1_1 );
    curl_setopt( $ch, CURLOPT_USERAGENT , 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22' );
    curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT , 30 );
    curl_setopt( $ch, CURLOPT_TIMEOUT , 30);
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER , true );
    if( $ispost )
    {
        curl_setopt( $ch , CURLOPT_POST , true );
        curl_setopt( $ch , CURLOPT_POSTFIELDS , $params );
        curl_setopt( $ch , CURLOPT_URL , $url );
    }
    else
    {
        if($params){
            curl_setopt( $ch , CURLOPT_URL , $url.'?'.$params );
        }else{
            curl_setopt( $ch , CURLOPT_URL , $url);
        }
    }
    $response = curl_exec( $ch );
    if ($response === FALSE) {
        //echo "cURL Error: " . curl_error($ch);
        return false;
    }
    $httpCode = curl_getinfo( $ch , CURLINFO_HTTP_CODE );
    $httpInfo = array_merge( $httpInfo , curl_getinfo( $ch ) );
    curl_close( $ch );
    return $response;
}

$content = juhecurl($sendUrl,$smsConf,1); //请求发送短信

if($content){
    $result = json_decode($content,true);
    $error_code = $result['error_code'];
    if($error_code == 0){
        //状态为0，说明短信发送成功
        // session_start();
        session(['yanzhengma'=>$yanzhengma,'phone'=>$_GET['phone']]);
        // $_SESSION['yanzhengma']=$yanzhengma;
        // $_SESSION['phone']=$_GET['phone'];
        // echo $_SESSION['yanzhengma'];
        echo 0;
    }else{
        //状态非0，说明失败
        // $msg = $result['reason'];
        echo "1";
    }
}else{
    //返回内容异常，以下可根据业务逻辑自行修改
        echo "2";
}
















































    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dump(1);
       // echo 1;
        // echo $_POST['name'];
        //注册用户
        // dump($_POST);
        // echo $_POST['_token'];

        // echo $_POST['name'];
        // $data=$_POST;
        // $data=$request->except('_token','npassword');
        // dump($data);
        //

    if(!empty(session('yanzhengma')) && !empty(session('phone'))){

        if($_POST['ma']==session('yanzhengma')&&$_POST['phone']==session('phone')){
        // unset($_SESSION);
        unset($_POST['ma']);
        $_POST['password']=md5($_POST['password']);
        $res=DB::table('home_users')->insert($_POST);
        $data=DB::table('home_users')->where('name','=',$_POST['name'])->first();
        DB::table('users_details')->insert(['user_id'=>($data->id)]);

        echo $res;
        // echo $res;
}else{
        echo 2;
}
        // dump($res);

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
        // echo $id;
        //
        $res=DB::table('home_users')->where('name','=',$id)->first();
        if($res){
            echo 1;
        }else{
            echo 2;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $request->session()->flush();
        return redirect("home");
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
