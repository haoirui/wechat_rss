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


Route::any('/wechat', 'WeChatController@serve');
Route::any('/wechat/menu', 'WeChatController@menu_refresh');
Route::get('/articles','MonitorController@articles');
Route::group(['middleware' => ['web', 'wechat.oauth','oauth.system']], function () {
    Route::get('/auth',"WeChatController@auth");
    Route::get('/monitor',"MonitorController@index");
    Route::get('/user/keywords',"MonitorController@keywords");
    Route::post('/user/keywords',"MonitorController@keywords");
    Route::get('/user/keyword_del/{subscription}',"MonitorController@keyword_del");
});
