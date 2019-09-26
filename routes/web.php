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

Route::redirect('/', '/user/message');

Route::resource('admin/message', 'Admin\AdminMessagesController', ['as' => 'admin'])->except(['create', 'store']);

Route::resource('user/message', 'User\UserMessagesController', ['as' => 'user'])->except(['edit', 'update', 'destroy']);

Auth::routes();
