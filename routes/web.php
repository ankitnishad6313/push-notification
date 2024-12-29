<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::group(['controller' => PostController::class], function(){
    Route::get('/', 'index')->name('home');
    Route::get('/show-notification', 'notification')->name('notification');
    Route::get('/create-post', 'create')->name('create-post');
    Route::post('/create-post', 'store')->name('store-post');
});
