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
Route::post('/admin/lunbo/del','admin\LunboController@del');//删除图片缩略图
Route::get('/admin/lunbo/status/{id}/{status}','admin\LunboController@status');//轮播图片禁用解禁
Route::resource('/admin/lunbo','admin\LunboController');//轮播图路由
Route::post('/admin/zixun/upload','admin\ZixunController@upload');//图片缩略图
Route::post('/admin/zixun/del','admin\ZixunController@del');
Route::get('/admin/zixun/xiangqing/{id}','admin\ZixunController@xiangqing');//资讯详情
Route::get('/admin/zixun/pinglun/{id}','admin\ZixunController@pinglun');//资讯评论
Route::get('/admin/zixun/pinglunshanchu/{id}','admin\ZixunController@pinglunshanchu');//资讯评论
Route::get('/admin/zixun/status/{id}/{status}','admin\ZixunController@status');
Route::get('/admin/zixun/content/{id}','admin\ZixunController@content');//添加内容页面
Route::post('/admin/zixun/adcon','admin\ZixunController@adcon');//执行添加内容
Route::get('/admin/zixun/contentedit/{id}','admin\ZixunController@contentedit');
Route::post('/admin/zixun/adconedit','admin\ZixunController@adconedit');//执行修改添加内容
Route::resource('/admin/zixun','admin\ZixunController');//资讯路由
























































































































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

// 添加游戏配置
Route::get('admin/highpei/display/{id}','admin\PeizrController@display');
Route::get('admin/highpei/delete/{id}','admin\PeizrController@shan');
Route::resource('admin/highpei','admin\PeizrController');
































//友情链接模块
Route::get('/admin/link/status/{id}/{status}','admin\LinkController@status');
Route::post('/admin/link/del','admin\LinkController@del');
Route::post('/admin/link/upload','admin\LinkController@upload');
Route::resource('/admin/link','admin\LinkController');
//广告模块
Route::get('/admin/ads/put/{id}','admin\AdsController@put');
Route::get('/admin/ads/top/{id}','admin\AdsController@top');
Route::post('/admin/ads/del','admin\AdsController@del');
Route::post('/admin/ads/upload','admin\AdsController@upload');
Route::resource('/admin/ads','admin\AdsController');
//帮助和反馈模块
Route::get('/admin/help/reply/{id}','admin\HelpController@reply');
Route::resource('/admin/help','admin\HelpController');
