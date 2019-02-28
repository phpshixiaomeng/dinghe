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


Route::get('/home','Home\IndexController@index');//主页路由
Route::resource('/home/login','Home\LoginController');//登陆路由
Route::resource('/home/zhuce','Home\ZhuceController');//注册路由
Route::post('/home/xiugai','Home\GrxxController@gaimima');//修改密码
Route::resource('/home/grxx','Home\GrxxController');//个人信息

//
Route::resource('/home/games','Home\GamesController');//游戏商品路由
Route::resource('/home/gamesnews','Home\GamesNewsController');//游戏新闻路由
Route::resource('/home/video','Home\VideoController');//游戏宣传视频
Route::resource('/home/luntan','Home\LuntanController');//游戏论坛
Route::resource('/home/luntanfatie','Home\LuntanFatieController');//游戏论坛发帖
Route::resource('/home/luntanshaitu','Home\LuntanShaituController');//游戏论坛晒图
Route::resource('/home/bokelist','Home\BokeListController');//博客
Route::resource('/home/bizhi','Home\BizhiController');//壁纸
Route::resource('/home/zhifu','Home\ZhifuController');//用户支付
Route::resource('/home/contact','Home\ContactController');//联系我们






//后台模板路由

Route::get('/admin','admin\IndexController@index');//后台主页模板
Route::resource('/admin/userlist','Home\HylistController');//前台用户信息列表
Route::resource('/admin/website','admin\WebsiteController');//网站信息路由


//



// 登录系统
Route::get('adminlg','admin\LoginController@index');
Route::post('adminlg/login','admin\LoginController@login');

// 添加管理员
Route::resource('admin/yhxx','admin\YhxxController');

// 管理员信息列表
Route::resource('admin/hy_list','admin\HylistController');


// 添加分类 ------ 分类列表
Route::get('admin/tjfl/display/{id}','admin\TjflController@display');
Route::get('admin/tjfl/create/{id}','admin\TjflController@create');
Route::resource('admin/tjfl','admin\TjflController');



// 添加游戏 ------ 游戏列表
Route::resource('admin/game','admin\GameController');





