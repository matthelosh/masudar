<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\InboxController;
use Illuminate\Http\Request;

use App\Http\Controllers\TesController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\LoginController;
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

Route::get('/', function(){
    return redirect('/login');
});

Route::get('/login', function(){
    return view('login');
});

Route::post('/login', [LoginController::class, 'login']);
Route::get('/reload-captcha', [LoginController::class, 'reloadCaptcha']);

// Pages
Route::get('/{page}', PagesController::class)->name('pages');












// Route::get('/testing', [TesController::class, 'index']);
// Route::post('testing', [TesController::class, 'upload']);
