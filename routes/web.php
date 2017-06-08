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

/*Route::post('/register','UsersController@store');

Route::get('/success',function (){
    return 'Register Success!';
})->name('cc');*/

Route::get('/confirm',function(){
    echo '邮件confirm成功';
});

Route::post('/register',['as'=>'zhuche','uses'=>'AuthRegisterController@store']);

Route::get('success/{data?}',function($data){
    echo "注册成功".$data;
})->name('success');



