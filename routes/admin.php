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

// 文章分类模块

Route::get('/article-category/index','ArticleCategoryController@index');

Route::post('/article-category/create','ArticleCategoryController@create');
Route::post('/article-category/edit','ArticleCategoryController@edit');
Route::post('/article-category/change-status','ArticleCategoryController@changeStatus');

Route::get('/article-category/category-options','ArticleCategoryController@categoryOptions');

// 文章管理

Route::get('/article/index','ArticleController@index');

Route::post('/article/create','ArticleController@create');
Route::post('/article/edit','ArticleController@edit');
Route::post('/article/change-status','ArticleController@changeStatus');
Route::post('/article/set-recommen','ArticleController@setRecommen');
