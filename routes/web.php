<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\IndexController;
use \App\Http\Controllers\ServerRenderingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [IndexController::class, 'index']);
Route::get('/server-filtering-sorting', [ServerRenderingController::class, 'index'])->name('server-rendering');
Route::get('/server-filtering-sorting/search', [ServerRenderingController::class, 'search']);
