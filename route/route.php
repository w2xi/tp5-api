<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 设置 http://api.test.com 允许跨域
// header('Access-Control-Allow-Origin: http://api.test.com');
// header('Access-Control-Allow-Methods: GET,POST');
// header('Access-Control-Allow-Headers: Content-Type');
/**
 * request content-type 测试
 */
/*
Route::get('/get-demo', function () {
    getParams();
});
Route::post('/post-form-urlencoded', function(){
	postFormUrlencoded();
});
Route::post('/post-form-data', function(){
	postFormData();
});
Route::post('/post-json', function(){
	postJson();
});
// Route::get('hello/:name', 'index/hello');
function getParams(){
	print_r($_GET);
}
function postFormUrlencoded(){
	print_r($_POST);
}
function postFormData(){
	print_r($_POST);
}
function postJson(){
	$data = file_get_contents("php://input"); // json string
	print_r($data);
}
*/

// Route::rule('/user/login', 'index/JwtLogin/login');
// Route::rule('/user/info', 'index/User/info')->middleware('JwtCheck');