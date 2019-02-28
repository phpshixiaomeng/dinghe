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
Route::resource('home','Home\IndexController');//主页路由
Route::resource('login','Home\LoginController');//登陆路由
Route::resource('zhuce','Home\ZhuceController');//注册路由
Route::resource('games','Home\GamesController');//游戏商品路由
Route::resource('gamesnews','Home\GamesNewsController');//游戏新闻路由
Route::resource('video','Home\VideoController');//游戏宣传视频
Route::resource('luntan','Home\LuntanController');//游戏论坛
Route::resource('luntanfatie','Home\LuntanFatieController');//游戏论坛发帖
Route::resource('luntanshaitu','Home\LuntanShaituController');//游戏论坛晒图
Route::resource('bokelist','Home\BokeListController');//博客
Route::resource('bizhi','Home\BizhiController');//壁纸
Route::resource('zhifu','Home\ZhifuController');//用户支付
Route::resource('contact','Home\ContactController');//联系我们






















































































































//后台模板路由
Route::get('admin','admin\IndexController@index');//后台主页模板

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
Route::get('admin/game/delete/{id}','admin\GameController@shan');
Route::resource('admin/game','admin\GameController');





