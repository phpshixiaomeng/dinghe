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
Route::post('/admin/lunbo/upload','admin\LunboController@upload');//图片缩略图
Route::post('/admin/lunbo/del','admin\LunboController@del');//图片缩略图
Route::get('/admin/lunbo/status/{id}/{status}','admin\LunboController@status');//轮播图片禁用解禁
Route::resource('/admin/lunbo','admin\LunboController');//轮播图路由
























































































































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
Route::get('admin/game/display/{id}','admin\GameController@display');
Route::get('admin/game/delete/{id}','admin\GameController@shan');
Route::resource('admin/game','admin\GameController');




























//友情链接模块
Route::get('/admin/link/status/{id}/{status}','admin\LinkController@status');
Route::post('/admin/link/dels','admin\LinkController@dels');
Route::post('/admin/link/upload','admin\LinkController@upload');
Route::resource('/admin/link','admin\LinkController');
//广告模块
Route::get('/admin/ads/put/{id}','admin\AdsController@put');
Route::get('/admin/ads/top/{id}','admin\AdsController@top');
Route::post('/admin/ads/dels','admin\AdsController@dels');
Route::post('/admin/ads/upload','admin\AdsController@upload');
Route::resource('/admin/ads','admin\AdsController');
//帮助和反馈模块
Route::get('/admin/help/reply/{id}','admin\HelpController@reply');
Route::get('/admin/help/del/{id}','admin\HelpController@del');
Route::post('/admin/help/dels','admin\HelpController@dels');
Route::get('/admin/help/history','admin\HelpController@history');
Route::get('/admin/help/huanyuan/{id}','admin\HelpController@huanyuan');
Route::post('/admin/help/add/{id}','admin\HelpController@add');
Route::post('/admin/help/update/{id}','admin\HelpController@update');
Route::resource('/admin/help','admin\HelpController');
//前台帮助和反馈模块
Route::get('/home/help','Home\HelpController@index');
Route::get('/home/help/reply','Home\HelpController@reply');
Route::get('/home/help/del/{id}','Home\HelpController@del');
Route::post('/home/help/add','Home\HelpController@add');