<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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
Route::group(['middleware' => 'auth'], function() {
    // タスク一覧ページを表示
    Route::get('/folders/{id}/tasks', 'App\Http\Controllers\TaskController@index')
    ->name('tasks.index');

    // フォルダ作成ページを表示する
    Route::get('/folders/create', 'App\Http\Controllers\FolderController@showCreateForm')
    ->name('folders.create');

    // フォルダ作成処理を実行する
    Route::post('/folders/create', 'App\Http\Controllers\FolderController@create');

    // タスク作成ページを表示する
    Route::get('/folders/{id}/tasks/create', 'App\Http\Controllers\TaskController@showCreateForm')
    ->name('tasks.create');

    // タスク作成処理を実行する
    Route::post('/folders/{id}/tasks/create', 'App\Http\Controllers\TaskController@create');

    // タスク編集ページを表示する
    Route::get('/folders/{id}/tasks/{task_id}/edit', 'App\Http\Controllers\TaskController@showEditForm')
    ->name('tasks.edit');

    // タスク編集処理を実行
    Route::post('/folders/{id}/tasks/{task_id}/edit', 'App\Http\Controllers\TaskController@edit');

    // ホーム画面
    Route::get('/', 'App\Http\Controllers\HomeController@index')
    ->name('home');

});

Auth::routes();
?>
