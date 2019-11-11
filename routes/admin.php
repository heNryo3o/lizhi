<?php

/**
 * 管理后台路由
 */

// 管理员登录登出,获取登录者信息

Route::get('/login/info','LoginController@info');

Route::post('/login/login','LoginController@login');
Route::post('/login/logout','LoginController@logout');

Route::post('/login/edit','LoginController@edit');
Route::post('/login/change-password','LoginController@changePassword');

// 系统功能

Route::post('/system/upload','SystemController@upload');

// 应用分类模块

Route::get('/category/index','CategoryController@index');
Route::get('/category/options','CategoryController@options');
Route::get('/category/news-options','CategoryController@newsOptions');

Route::post('/category/create','CategoryController@create');
Route::post('/category/edit','CategoryController@edit');
Route::post('/category/change-status','CategoryController@changeStatus');

// 资讯分类模块

Route::get('/news-category/index','NewsCategoryController@index');

Route::post('/news-category/create','NewsCategoryController@create');
Route::post('/news-category/edit','NewsCategoryController@edit');
Route::post('/news-category/change-status','NewsCategoryController@changeStatus');

// 应用管理

Route::get('/apps/index','AppController@index');

Route::post('/apps/create','AppController@create');
Route::post('/apps/edit','AppController@edit');
Route::post('/apps/change-status','AppController@changeStatus');
Route::post('/apps/set-recommen','AppController@setRecommen');

// banner 管理

Route::get('/banner/index','BannerController@index');

Route::post('/banner/create','BannerController@create');
Route::post('/banner/edit','BannerController@edit');
Route::post('/banner/change-status','BannerController@changeStatus');

// 应用管理

Route::get('/news/index','NewsController@index');

Route::post('/news/create','NewsController@create');
Route::post('/news/edit','NewsController@edit');
Route::post('/news/change-status','NewsController@changeStatus');
Route::post('/news/set-recommen','NewsController@setRecommen');
