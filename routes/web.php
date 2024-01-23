<?php

use App\Http\Controllers\CompletionController;
use App\Http\Controllers\DeleteController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostViewController;
use App\Http\Controllers\RegistrationController;
use App\Http\Middleware\CheckLoggedIn;
use Illuminate\Support\Facades\Route;


// メイン画面
Route::get('/', [IndexController::class, 'get'])->middleware(CheckLoggedIn::class);
Route::post('/', [IndexController::class, 'post']);

// ログイン画面
Route::get('/login', [LoginController::class, 'get']);
Route::post('/login', [LoginController::class, 'post']);

// 投稿詳細・削除画面
Route::get('/postview/{user_id?}', [PostViewController::class, 'get'])->name('postview')->middleware(CheckLoggedIn::class);
Route::get('/delete/{post_id?}', [DeleteController::class, 'get'])->name('deletecheck')->middleware(CheckLoggedIn::class);
Route::delete('/delete/{post_id}', [DeleteController::class, 'delete'])->name('delete');

// ログアウト画面
Route::get('/logout', [LogoutController::class, 'get'])->middleware(CheckLoggedIn::class);
Route::post('/logout', [LogoutController::class, 'post']);

// 会員登録画面
Route::get('/registration', [RegistrationController::class, 'get']);
Route::post('/registration', [RegistrationController::class, 'post']);
Route::get('/completion', [CompletionController::class, 'get']);