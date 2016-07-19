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


//微信验证
Route::any('/wechat','WxController@server');

//注册路由
Route::get('auth/reg','Auth\AuthController@getRegister');
Route::post('auth/reg','Auth\AuthController@postRegister');
//登录路由
Route::get('auth/login','Auth\AuthController@getLogin');
Route::post('auth/login','Auth\AuthController@postLogin');
//登出路由
Route::get('auth/logout','Auth\AuthController@getLogout');

Route::get('/home',function(){
    return '注册成功!';
});