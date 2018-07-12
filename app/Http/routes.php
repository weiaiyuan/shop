<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|----------------  雒小刚 开始位置 (20~70行) ---------------------
*/
Route::get('/admin', function () {
    return view('admin.index.index');
});
Route::controller('/admin/order','Admin\OrderController');







































/*
|----------------雒小刚 结束位置---------------------
*/


/*
|----------------张纯泽 开始位置 (75~125行) -----------
*/

 //用户管理

Route::resource('/admin/user','Admin\UserController');
//用户软删除
Route::controller('/user/show','Admin\SoftController');
//后台登录
Route::controller('/admin/login','Admin\LoginController');
//轮播管理
Route::controller('/admin/sowing','Admin\SowingController');
//前台注册
Route::controller('/home/zhuce','Home\ZhuceController');
//前台登录
Route::controller('/home/login','Home\LoginController');
//前台手机注册
Route::post('/home/zhuze/homeindex','Home\ZhuceController@postHomeindex');













































/*
|----------------张纯泽 结束位置  -----------
*/


/*
|---------------葛景伟 开始位置 (130~185行) -----------
*/
Route::resource('/admin/links','Admin\LinkController');
//网站配置路由
Route::resource('/admin/shet','Admin\ShetController');
Route::get('/admin/restores/{id}','Admin\ShetController@restores');
Route::get('/admin/del/{id}','Admin\ShetController@del');
Route::get('/admin/weihu','Admin\ShetController@weihu');
//广告管理路由
Route::resource('/admin/ad','Admin\AdController');
Route::get('/admin/restores/{id}','Admin\AdController@restores');
Route::get('/admin/del/{id}','Admin\AdController@del');
//评论管理路由
Route::resource('/admin/comment','Admin\CommentController');

//前台用户
//LOGO 标题路由
Route::get('/home/index','Home\ShetController@homes');
//评论路由
Route::controller('home/comment','Home\CommentController');















































/*
|----------------  葛景伟结束位置 -- ------------------
*/


/*
|----------------蒋旺生 开始位置 (185行之后) -----------
*/
Route::controller('/admin/cate','Admin\CateController'); //商品类别
Route::resource('/admin/good','Admin\GoodsController'); //商品详情
Route::controller('/admin/goodlook','Admin\ChaController');//查看内容
Route::resource('/home/cate','Home\HomeCateController');//前台类别
Route::resource('/admin/activity','Admin\ActivityController');//活动模块
Route::resource('/home/activity','Home\HomeActivityController');//前台活动控制器


