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
Route::get('/home/youxiang/{id}','Home\LoginController@youxiang');
Route::post('/home/shensu','Home\LoginController@shensu');//申诉路由

Route::resource('/home/login','Home\LoginController');//登陆路由
Route::resource('/home/zhuce','Home\ZhuceController');//注册路由


//


Route::group(['middleware'=>'logins'],function(){
Route::post('/home/gamesnews','Home\GamesNewsController@store');//评论路由
Route::get('/home/gamesnews/zan/{id}','Home\GamesNewsController@zan');//评论赞
Route::get('/home/gamesnews/cai/{id}','Home\GamesNewsController@cai');//评论踩
Route::get('/home/gamesnews/star/{id}/{cid}','Home\GamesNewsController@star');//评星
Route::post('/home/xiugai','Home\GrxxController@gaimima');//修改密码
Route::post('/home/grxx/upload','Home\GrxxController@upload');//头像缩略图
Route::resource('/home/grxx','Home\GrxxController');//个人信息
});

Route::resource('/home/games','Home\GamesController');//游戏商品路由
Route::resource('/home/video','Home\VideoController');//游戏宣传视频

Route::resource('/home/{id}/gamesnews','Home\GamesNewsController');
//游戏资讯路由


Route::resource('/home/bokelist','Home\BokeListController');//资讯列表
Route::resource('/home/bizhi','Home\BizhiController');//壁纸
// 购物车模块
Route::group(['middleware'=>'logins'],function(){
Route::get('/home/zhifu/fu/{id}','Home\ZhifuController@zhifu');
Route::get('/home/zhifu/heji/{id}','Home\ZhifuController@heji');
Route::get('home/zhifu/jia/{id}','Home\ZhifuController@jia');
Route::get('/home/zhifu/jian/{id}','Home\ZhifuController@jian');
Route::get('/home/zhifu/qx/{id}','Home\ZhifuController@xuan');
Route::get('/home/zhifu/qu','Home\ZhifuController@qu');
Route::get('/home/zhifu/shua','Home\ZhifuController@sx');
Route::resource('/home/zhifu','Home\ZhifuController');//用户支付
});
Route::resource('/home/contact','Home\ContactController');//联系我们

//后台模板路由

























































































































//

















// 游戏详情部分(前台)

Route::get('home/gamexq/star/{id}/{cid}','Home\GamexqController@star');//评星
Route::get('home/gamexq/cang/{id}','Home\GamexqController@shoucang');
Route::get('home/gamexq/shan/{id}','Home\GamexqController@shan');

Route::resource('home/gamexq','Home\GamexqController');



// 前台订单
Route::get('home/order/display/{id}','Home\OrderController@display');
Route::resource('home/order','Home\OrderController');

/*// 后台订单
Route::resource('admin/order','admin\OrderController');*/

































//前台帮助和反馈模块
Route::group(['middleware'=>'logins'],function(){
Route::get('/home/help','Home\HelpController@index');
Route::get('/home/help/num','Home\HelpController@num');
Route::get('/home/help/reply','Home\HelpController@reply');
Route::get('/home/help/del/{id}','Home\HelpController@del');
Route::post('/home/help/add','Home\HelpController@add');
});
//论坛模块
Route::group(['middleware'=>'logins'],function(){
    Route::get('/home/luntan/zan/{id}','Home\LuntanController@zan');
    Route::get('/home/luntan/cai/{id}','Home\LuntanController@cai');

    Route::get('/home/luntan/xinxi','Home\LuntanController@xinxi');
    Route::post('/home/luntan/huitie','Home\LuntanController@huitie');
    Route::post('/home/luntan/huifu','Home\LuntanController@huifu');
    Route::get('/home/luntan/delete/{id}','Home\LuntanController@delete');
    Route::get('/home/luntan/del/{id}','Home\LuntanController@del');
    Route::get('/home/luntan/deleted/{id}','Home\LuntanController@deleted');
});
Route::resource('/home/luntan','Home\LuntanController');
Route::get('/home/luntan/num','Home\LuntanController@num');

























// 登录系统
Route::resource('/admin/login','admin\AdminLoginController');


Route::group(['middleware'=>['login','rbac']],function(){
//用户个人信息
Route::resource('/admin/geren','admin\GerenController');
//用户节点
Route::get('/admin/nodes/nodeadd','admin\NodesController@nodeadd');
Route::post('/admin/nodes/insert','admin\NodesController@insert');
Route::resource('/admin/nodes','admin\NodesController');
//用户管理后台
Route::get('/admin/user/role/{id}','admin\UserController@role');
Route::post('/admin/user/updaterole/{id}','admin\UserController@updaterole');
Route::resource('/admin/user','admin\UserController');

// 游戏展示图
Route::get('admin/gameimg/delete/{id}','admin\GameimgController@imgdel');
Route::resource('admin/gameimg','admin\GameimgController');

//游戏轮播图片
Route::get('admin/gamepic/delete/{id}','admin\GamepicController@picdel');
Route::resource('admin/gamepic','admin\GamepicController');

// 游戏时间
Route::get('admin/gameys/delete/{id}','admin\GameysController@ysdel');
Route::resource('admin/gameys','admin\GameysController');

// 添加分类 ------ 分类列表
Route::get('admin/tjfl/display/{id}','admin\TjflController@display');
Route::get('admin/tjfl/create/{id}','admin\TjflController@create');
Route::resource('admin/tjfl','admin\TjflController');

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


// 添加游戏 ------ 游戏列表
Route::get('admin/game/image','admin\GameController@image');
Route::get('admin/game/display/{id}','admin\GameController@display');
Route::get('admin/game/delete/{id}','admin\GameController@shan');
Route::resource('admin/game','admin\GameController');

// 添加游戏配置
Route::get('admin/highpei/display/{id}','admin\PeizrController@display');
Route::get('admin/highpei/delete/{id}','admin\PeizrController@shan');
Route::resource('admin/highpei','admin\PeizrController');
//论坛后台
Route::get('/admin/luntan/delete/{id}','admin\LuntanController@delete');
Route::get('/admin/luntan/del/{id}','admin\LuntanController@del');
Route::get('/admin/luntan/reply/{id}','admin\LuntanController@reply');
Route::get('/admin/luntan/huifu/{id}','admin\LuntanController@huifu');
Route::get('/admin/luntan/deleted/{id}','admin\LuntanController@deleted');
Route::resource('/admin/luntan','admin\LuntanController');

//帮助和反馈模块后台
Route::get('/admin/help/reply/{id}','admin\HelpController@reply');
Route::get('/admin/help/del/{id}','admin\HelpController@del');
Route::post('/admin/help/dels','admin\HelpController@dels');
Route::get('/admin/help/history','admin\HelpController@history');
Route::get('/admin/help/huanyuan/{id}','admin\HelpController@huanyuan');
Route::post('/admin/help/add/{id}','admin\HelpController@add');
Route::post('/admin/help/update/{id}','admin\HelpController@update');
Route::resource('/admin/help','admin\HelpController');

//友情链接模块后台
Route::get('/admin/link/status/{id}','admin\LinkController@status');
Route::post('/admin/link/dels','admin\LinkController@dels');
Route::post('/admin/link/upload','admin\LinkController@upload');
Route::resource('/admin/link','admin\LinkController');
//广告模块后台
Route::get('/admin/ads/put/{id}','admin\AdsController@put');
Route::get('/admin/ads/top/{id}','admin\AdsController@top');
Route::post('/admin/ads/dels','admin\AdsController@dels');
Route::post('/admin/ads/upload','admin\AdsController@upload');
Route::resource('/admin/ads','admin\AdsController');
});