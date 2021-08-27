<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\WebrtcStreamingController;

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

Route::get('/', [\App\Http\Controllers\HomeController::class  , 'test']);

Auth::routes();
Route::get('/streaming', [WebrtcStreamingController::class , 'index']);
Route::get('/streaming/{streamId}', [WebrtcStreamingController::class , 'consumer'] );
Route::post('/stream-offer',  [WebrtcStreamingController::class , 'makeStreamOffer']);
Route::post('/stream-answer',  [WebrtcStreamingController::class , 'makeStreamAnswer']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/upload', [App\Http\Controllers\HomeController::class, 'upload'])->name('upload');
