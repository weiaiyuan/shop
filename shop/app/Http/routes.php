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













































/*
|----------------张纯泽 结束位置  -----------
*/


/*
|---------------葛景伟 开始位置 (130~185行) -----------
*/















































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



