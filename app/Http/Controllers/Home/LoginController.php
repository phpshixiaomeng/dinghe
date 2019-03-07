<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
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


        // echo $_POST['name'];
    //用户登录验证
    // echo 1111;
    // exit;

    $_POST['password']=md5($_POST['password']);


        $res=DB::table('home_users')->where($_POST)->first();
    if($res){

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

        // echo 11111;






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

    public function youxiang($id){

             $mail = new PHPMailer(true);
            $mail->isSMTP(); // tell to use smtp
            $mail->CharSet = "utf-8"; // set charset to utf8
            $mail->SMTPAuth = true;  // use smpt auth
            $mail->SMTPSecure = "tls"; // or ssl
            $mail->Host = "smtp.qq.com";

            $mail->Port = 25;
            $mail->Username = "470929037@qq.com";
            $mail->Password = "spwnpodzrvuzbjca";//去开通的qq或163邮箱中找,这里用的不是邮箱的密码，而是开通之后的一个token

            $mail->setFrom("470929037@qq.com", "阿浩战阿威");//设置邮件来源  //发件人
            //标题内容都是网站管理员设定好的
            $mail->Subject = "侯延威之大力丸"; //邮件标题
            $rand=rand('1111','9999');
            $mail->MsgHTML("您的验证码为".$rand);  //邮件内容

            $mail->addAddress("$id");  //收件人（用户输入的邮箱）
            $res = $mail->send();
            if($res){
            session(['youxiang'=>$id,'yanzhengma'=>$rand]);
            echo 1;
            }else{
                echo 2;
            }
    }

    public function shensu(Request $request){

    if(session('youxiang')!=$_POST['youxiang'] || session('yanzhengma')!=$_POST['yanzhengma']){
    $arr=[
    'msg'=>3
     ];
     return json_encode($arr);
    }else{

    $res=DB::table('home_users')->where(['name'=>$_POST['name'],'youxiang'=>$_POST['youxiang']])->first();
    if($res){
    $password='a'.time();
    DB::table('home_users')->where('name',$_POST['name'])->update(['password'=>md5($password)]);
    $password='a'.time();

    $arr=[
    'msg'=>1,
    'password'=>$password

    ];
    return json_encode($arr);
    }else{
      $arr=[
    'msg'=>2
     ];
     return json_encode($arr);
    }
    }
    }
}
