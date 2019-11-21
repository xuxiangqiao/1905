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


//闭包路由
//Route::get('/', function () {
//    return view('welcome');
//});
////闭包
//Route::get('/hello',function(){
//    echo 123;
//});
//
////路由视图
//Route::view('/login','hh');

//post 路由
//Route::post('/dofrom',function(){
//    $post = request()->post();
//    dd($post);
//});


//Route::get('/reg','RegController@index');
//Route::post('/dofrom','RegController@dofrom');
//
//Route::redirect('/reg','/hello');
//
////Route::get('/goods/{goods_id}',function($goods_id){
////    echo $goods_id;
////});
//
////必填
//Route::get('/goods/{goods_id}','RegController@goods');
////可选
//Route::get('/goods/{goods_id?}','RegController@goods');
//
//
////http://www.xxx.com/show/1
//Route::get('/show/{id}/{name?}',function($id,$username='隔壁老王'){
//    
//    echo $id;
//    echo $username;
//});
////可选  必须赋值
//Route::get('/show2/{id?}',function($id='0'){
//    echo 456;
//    echo $id;
//})->where('id','[0-9]');


//cookie

Route::get('/setcookie',function(){
     //队列设置cookie
    //Cookie::queue(Cookie::make('name', '张继科', 2));
    Cookie::queue('num', '100', 2);
    
    //获取
   // $name = request()->cookie('name');
//    $name = Illuminate\Support\Facades\Cookie::get('username');
//    echo $name;
    //设置
    
    //return response('欢迎来到 Laravel 学院')->cookie('name', '学院君', 2);
});

Route::get('/cookie',function(){
  
    //获取
   // $name = request()->cookie('name');
    $name = Illuminate\Support\Facades\Cookie::get('num');
    echo $name;
    //设置
    
    //return response('欢迎来到 Laravel 学院')->cookie('name', '学院君', 2);
});





//品牌
Route::prefix('/brand')->group(function(){
        Route::get('create','Admin\BrandController@create');
        Route::post('store','Admin\BrandController@store');
        Route::get('index','Admin\BrandController@index');
        Route::get('delete/{id}','Admin\BrandController@destroy');
        Route::get('edit/{id}','Admin\BrandController@edit');
        Route::post('update/{id}','Admin\BrandController@update'); 
        Route::post('checkOnly','Admin\BrandController@checkOnly');
});

//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');

Route::view('/login','hh')->name('login');
//Route::post('/dologin','RegController@dologin');
//Route::view('/reg','reg');
//Route::post('/doReg','RegController@doReg');


Route::get('/','Index\IndexController@index');
//Route::view('/login','index.login.login');
Route::view('/reg','index.login.reg');

//Route::get('/send','Index\LoginController@send');

Route::get('/send','Index\LoginController@send');

Route::get('/pay/{orderid}','Index\LoginController@pay');
Route::get('/return_url','Index\LoginController@return_url');

Route::view('/exam/login','hh');
Route::post('/exam/dologin','exam\IndexController@dologin');

Route::get('/exam','exam\IndexController@index')->middleware('checkexam');
Route::get('/exam/admin','exam\IndexController@lists')->middleware('checkexam');
Route::get('/exam/admin/create','exam\IndexController@create')->middleware('checkexam');
Route::post('/exam/admin/store','exam\IndexController@store')->middleware('checkexam');

Route::get('/exam/goods','exam\IndexController@goodslists')->middleware('checkexam');
Route::get('/exam/goods/create','exam\IndexController@goodscreate')->middleware('checkexam');
Route::post('/exam/goods/store','exam\IndexController@goodsstore')->middleware('checkexam');

//出入库
Route::get('/exam/goods/{option}/{id}','exam\IndexController@output')->middleware('checkexam');
Route::post('/exam/goods/update/{option}/{id}','exam\IndexController@update')->middleware('checkexam');

//日志管理
Route::get('/exam/log','exam\IndexController@log')->middleware('checkexam');

