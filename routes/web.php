<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\WebrtcStreamingController;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\MessengerController;
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
// < token route >
Route::get('/', [HomeController::class  , 'viewBtn'])->name('viewBtn');
Route::post('/set/session', [HomeController::class  , 'setSession'])->name('setSession');
Route::get('/form', [HomeController::class  , 'formSession'])->name('formSession');
Route::post('/check/session', [HomeController::class  , 'checkSession'])->name('checkSession');
// </ token route >

// < api buy >
Route::get('/buy' , [HomeController::class , 'buyProduct'])->name('buyProduct');
// </ api buy >

// < Pusher >
Route::get('/form' , [HomeController::class , 'form'])->name('form');
Route::post('/form' , [HomeController::class , 'sendForm'])->name('send.form');
// </ Pusher >

// < Messenger >
Route::prefix('/app')->as('app')->middleware('auth')->group(function (){
    Route::get('/' , [MessengerController::class , 'app'])->name('.index');
    Route::post('/search/user' , [MessengerController::class , 'searchUser'])->name('.search.user');
    Route::post('/check/status/user' , [MessengerController::class , 'checkStatus'])->name('.check.status');
    Route::post('/check/status/my' , [MessengerController::class , 'checkStatusMy'])->name('.check.statusMy');
    Route::post('/offline/user' , [MessengerController::class , 'offlineUser'])->name('.offline.user');
    Route::post('/send/message/{getter}' , [MessengerController::class , 'sendMessage'])->name('.send');
});
// </ Messenger >

Route::get('/test' , [HomeController::class , 'test'])->name('test');

Auth::routes(['verify' => true]);
Route::get('/streaming', [WebrtcStreamingController::class , 'index']);
Route::get('/streaming/{streamId}', [WebrtcStreamingController::class , 'consumer'] );
Route::post('/stream-offer',  [WebrtcStreamingController::class , 'makeStreamOffer']);
Route::post('/stream-answer',  [WebrtcStreamingController::class , 'makeStreamAnswer']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/upload', [HomeController::class, 'upload'])->name('upload');
