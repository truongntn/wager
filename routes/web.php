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

Route::get('list', function () {
    return view('list');
});

Route::get('buywagers', function () {
    return view('buywagers');
});

Route::get('placewagers', function () {
    return view('placewagers');
});

Route::get('wagerslist', function () {
    return view('wagerslist');
});

Route::get('/buy/{wager_id}', function () {
    return view('buy');

});
Route::post('/buy/{wager_id}', function () {
    return view('buy');

});

Route::post('wagers', function () {
    return view('wagers');
});

Route::get('sayhello', function(){
	echo 'Hello Laravel! I am a new chicken';
});

Route::get('sayhello/{name}', function($name){
	echo 'Hello Laravel! I am '.$name;
});

Route::get('sayhello/{name?}', function($name = 'null' ){
	echo 'Hello Laravel! I am '.$name;
});

Route::group(['prefix' => 'product'], function(){
	Route::get('add', function(){
		echo 'Thêm nội dung';
	});
	Route::get('edit', function(){
		echo 'Sửa nội dung';
	});
	Route::get('del', function(){
		echo 'Xóa nội dung';
	});
});