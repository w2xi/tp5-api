<?php

/**
 * API接口路由
 */
Route::rule('/user/login', 'index/JwtLogin/login');
Route::rule('/user/info', 'index/User/info')->middleware('JwtCheck');