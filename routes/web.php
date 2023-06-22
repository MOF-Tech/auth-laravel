<?php

use App\Http\Controllers\HandlerController;
use Illuminate\Support\Facades\Route;

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
//     return view('userform.login');
// });
  

// Route::get('/login,[]);
Route::get('/join', [HandlerController::class, 'index'])->name('logged');
Route::post('/login', [HandlerController::class, 'loginUser']);

//register
Route::get('/reg', [HandlerController::class, 'reg'])->name('reg');
Route::post('/reg-create', [HandlerController::class, 'store']);

