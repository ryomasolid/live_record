<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/article', 'App\Http\Controllers\ArticleController@index')->name('article.index');
Route::delete('/article/{id}', 'App\Http\Controllers\ArticleController@destroy')->name('article.destroy');
Route::get('/article/create', 'App\Http\Controllers\ArticleController@create')->name('article.create');
Route::post('/article/create', 'App\Http\Controllers\ArticleController@storeCreate')->name('article.storeCreate');
Route::get('/article/profile', 'App\Http\Controllers\ArticleController@profile')->name('article.profile');
// 設定ページへ
Route::get('/setting/configuration', 'App\Http\Controllers\SettingController@configuration')->name('setting.configuration');
// ユーザー名変更ページへ
Route::get('/setting/nameChange', 'App\Http\Controllers\SettingController@nameChange')->name('setting.nameChange');
// ユーザー名変更処理へ
Route::post('/setting/nameChange', 'App\Http\Controllers\SettingController@change')->name('setting.change');

// ユーザーアイコン変更処理へ
Route::post('/setting/iconChange', 'App\Http\Controllers\SettingController@icon')->name('setting.icon');

Route::post('/article/{id}', 'App\Http\Controllers\ArticleController@edit')->name('article.edit');
Route::put('/article/{id}', 'App\Http\Controllers\ArticleController@updata')->name('article.updata');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
