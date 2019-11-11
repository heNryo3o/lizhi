<?php

Route::get('/','ViewController@index')->name('/');
Route::get('/article.html','ViewController@news')->name('news');
Route::get('/article-list/{slug}.html','ViewController@article')->name('article.list');
Route::get('/article-info/{slug}.html','ViewController@articleInfo')->name('article.info');

Route::get('/seo','ViewController@seo');
Route::get('/test2','ViewController@test2');
Route::get('/query','ViewController@query');
