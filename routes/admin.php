<?php

#####HomeController
Route::get('home','HomeController@index');

#####UserController
Route::get('users','UserController@index');
Route::get('users/create','UserController@create');
Route::post('users/store','UserController@store');
Route::get('users/{id}/edit','UserController@edit');
Route::post('users/{id}/update','UserController@update');
Route::get('users/{id}/show','UserController@show');
Route::get('users/{id}/delete','UserController@destroy');

#####SettingController
Route::get('setting','SettingController@index');
Route::get('setting/create','SettingController@create');
Route::post('setting/store','SettingController@store');
Route::get('setting/{id}/show','SettingController@show');
Route::get('setting/{id}/edit','SettingController@edit');
Route::post('setting/{id}/update','SettingController@update');
Route::get('setting/{id}/delete','SettingController@destroy');
Route::get('artisan','SettingController@ArtisanCommand');
Route::post('artisan/add','SettingController@ArtisanPost');

#####MenuController
Route::get('menu','MenuController@index');
Route::get('menu/create','MenuController@create');
Route::post('menu/store','MenuController@store');
Route::get('menu/{id}/show','MenuController@show');
Route::get('menu/{id}/edit','MenuController@edit');
Route::post('menu/{id}/update','MenuController@update');
Route::get('menu/{id}/delete','MenuController@destroy');

#####LinkController
Route::get('link','LinkController@index');
Route::get('link/create','LinkController@create');
Route::post('link/store','LinkController@store');
Route::get('link/{id}/delete','LinkController@destroy');

#####SeoController
Route::get('seo','SeoController@index');
Route::get('seo/create','SeoController@create');
Route::post('seo/store','SeoController@store');
Route::get('seo/{id}/show','SeoController@show');
Route::get('seo/{id}/edit','SeoController@edit');
Route::post('seo/{id}/update','SeoController@update');
Route::get('seo/{id}/delete','SeoController@destroy');

#####NewsController
Route::get('get/news','NewsController@index');
Route::get('news/create','NewsController@create');
Route::post('news/store','NewsController@store');
Route::get('news/{id}/show','NewsController@show');
Route::get('news/{id}/edit','NewsController@edit');
Route::post('news/{id}/update','NewsController@update');
Route::get('news/{id}/delete','NewsController@destroy');