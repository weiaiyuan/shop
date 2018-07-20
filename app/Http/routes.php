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
Route::get('/','Home\HomeActivityController@index');     //前台首页
Route::get('/admin', function () {
    return view('admin.index.index');
});
// 后台订单管理路由
Route::controller('/admin/order','Admin\OrderController');

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

Route::group(['middleware'=>'login'],function(){
Route::resource('/admin/user','Admin\UserController');
//用户软删除
Route::controller('/user/show','Admin\SoftController');
//轮播管理
Route::controller('/admin/sowing','Admin\SowingController');
//后台主页
Route::get('/admin', function () {
    return view('admin.index.index');

});
//后台反馈管理
Route::controller('/admin/wenti','Admin\WentiController');
});

//后台登录
Route::controller('/admin/login','Admin\LoginController');


//前台注册
Route::controller('/home/zhuce','Home\ZhuceController');
//前台登录
Route::controller('/home/login','Home\LoginController');
//前台手机注册
Route::post('/home/zhuze/homeindex','Home\ZhuceController@postHomeindex');
//个人中心
Route::controller('/home/geren','Home\GerenController');


//前台地址管理
Route::controller('/home/dizhi','Home\DizhiController');
//问题反馈
Route::controller('/home/wenti','Home\WentiController');



Route::resource('/admin/user','Admin\UserController');
//用户软删除
Route::controller('/user/show','Admin\SoftController');













































/*
|----------------张纯泽 结束位置  -----------
*/


/*
|---------------葛景伟 开始位置 (130~185行) -----------
*/

/*
|----------------蒋旺生 开始位置 (185行之后) -----------
*/
Route::controller('/admin/cate','Admin\CateController'); //商品类别
Route::resource('/admin/good','Admin\GoodsController'); //商品详情
Route::controller('/admin/goodlook','Admin\ChaController');//查看内容
Route::resource('/home/cate','Home\HomeCateController');//前台类别
Route::resource('/admin/activity','Admin\ActivityController');//活动模块
Route::resource('/home','Home\HomeActivityController');//前台活动控制器
Route::resource('/admin/push','Admin\PushController');//后台推荐位管理
Route::controller('/admin/pushhuifu','Admin\PushController');//推荐软删除
Route::resource('/home/detail','Home\DetailController');//前台商品详情
Route::controller('/home/goshop','Home\GoshopController');//商品购物车&&删除
Route::controller('/home/collect','Home\SoucangController');//我的收藏
Route::controller('/home/js','Home\JsController');	//结算控制器




