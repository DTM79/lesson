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

Route::get('/', 'IndexController@index')->name('index');

Route::get('/offers', 'OffersController@offers')->name('offers');
Route::get('/offers/add', 'OffersController@add')->name('offers-add')->middleware('auth');
Route::post('/offers/submit', 'OffersController@submit')->name('offers-submit')->middleware('auth');
Route::get('/offers/edit/{offer}', 'OffersController@edit')->name('offers-edit')->middleware (['auth', 'checkUser']);
Route::post('/offers/edit/submit/{offer}', 'OffersController@submitedit')->name('offers-submit-edit')->middleware (['auth', 'checkUser']);
Route::get('/offers/remove/{offer}', 'OffersController@remove')->name('offers-remove')->middleware (['auth', 'checkUser']);
Route::get('/offers/view/{offer}', 'OffersController@view')->name('offers-view');



Route::get('/articles', 'ArticlesController@articles')->name('articles');
Route::get('/articles/add', 'ArticlesController@add')->name('articles-add')->middleware('auth');
Route::post('/articles/submit', 'ArticlesController@submit')->name('articles-submit')->middleware('auth');
Route::get('/articles/edit/{article}', 'ArticlesController@edit')->name('articles-edit')->middleware (['auth', 'checkUser1']);
Route::post('/articles/edit/submit/{article}', 'ArticlesController@submitedit')->name('articles-submit-edit')->middleware (['auth', 'checkUser1']);
Route::get('/articles/remove/{article}', 'ArticlesController@remove')->name('articles-remove')->middleware (['auth', 'checkUser1']);
Route::get('/articles/view/{article}', 'ArticlesController@view')->name('articles-view');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/offers/search', 'OffersController@search')->name('search');
