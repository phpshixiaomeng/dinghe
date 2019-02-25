<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//前台页面路由
Route::resource('/home','Home\IndexController');//主页路由
Route::resource('/login','Home\LoginController');//登陆路由
Route::resource('/zhuce','Home\ZhuceController');//注册路由
Route::resource('/games','Home\GamesController');//游戏商品路由
Route::resource('/gamesnews','Home\GamesNewsController');//游戏新闻路由
Route::resource('/video','Home\VideoController');//游戏宣传视频
Route::resource('luntan','Home\LuntanController');//游戏论坛
Route::resource('luntanfatie','Home\LuntanFatieController');//游戏论坛发帖
Route::resource('luntanshaitu','Home\LuntanShaituController');//游戏论坛晒图
Route::resource('bokelist','Home\BokeListController');//博客
Route::resource('bizhi','Home\BizhiController');//壁纸
Route::resource('zhifu','Home\ZhifuController');//用户支付
Route::resource('contact','Home\ContactController');//联系我们


// 登录中间件组
//后台模板路由
Route::resource('/admin','admin\IndexController');//后台主页模板
Route::resource('/hy_list','admin\HylistController');//后台会议列表
Route::resource('/xjhy','admin\XinjianController');//新建会议路由
Route::resource('/hymb','admin\HymbController');//终端召集会议模板
Route::resource('/cchy','admin\CchyController');//已经存储的会议
Route::resource('/zdlb','admin\ZdlbController');//终端列表
Route::resource('/qzlb','admin\QzlbController');//群组列表
Route::resource('/sjbf','admin\SjbfController');//终端数据备份
Route::resource('lfpz','admin\LfpzController');//流服务器配置
Route::resource('/fwqkz','admin\FwqkzController');//流服务器控制
Route::resource('/mkzt','admin\MkztController');//模块状态
Route::resource('/mkkz','admin\MkkzController');//模块控制
Route::resource('/wltj','admin\WltjController');//网络统计
Route::resource('/zcxx','admin\ZcxxController');//GK注册信息
Route::resource('/ping','admin\PingController');//Ping
Route::resource('/xtpz','admin\XtpzController');//MCU配置
Route::resource('/wlpz','admin\WlpzController');//网络配置
Route::resource('/gkpz','admin\GkpzController');//GK配置
Route::resource('/dlpz','admin\DlpzController');//FPass配置
Route::resource('/gzrj','admin\GzrjController');//故障日志
Route::resource('/xtrj','admin\XtrjController');//系统日志
Route::resource('/yhxx','admin\YhxxController');//用户信息
Route::resource('/rjsj','admin\RjsjController');//软件升级
Route::resource('/hfsz','admin\HfszController');//恢复出厂设置
Route::resource('/sjgl','admin\SjglController');//数据库管理
Route::resource('/bdcx','admin\BdcxController');//数据库补丁程序
Route::resource('/gnxk','admin\GnxkController');//功能许可
Route::resource('/cqxt','admin\CqxtController');//重启MCU
Route::resource('/tcxt','admin\TcxtController');//退出系统

// 登录系统
Route::get('adminlg','admin\LoginController@index');
Route::post('adminlg/login','admin\LoginController@login');





