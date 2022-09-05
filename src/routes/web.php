<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StreamController;

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

Route::get('/', [StreamController::class, 'list']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/stream/new', [StreamController::class, 'create'])->name('stream-new');
    Route::post('/stream/new', [StreamController::class, 'createSubmit'])->name('stream-new-submit');
    Route::post('/stream/{id}/finish', [StreamController::class, 'finish'])->name('stream-finish');
});

Route::get('/stream/{id}', [StreamController::class, 'show'])->name('stream-show');

Auth::routes();