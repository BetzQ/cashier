<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\addOrUpdateController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\DataCollector\DataCollector;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[DataController::class,'show'])->middleware(['auth','verified'])->name('dashboard');
Route::get('/mainSide', [MainController::class,'show'])->middleware(['auth','verified'])->name('mainSide');
Route::get('/inputMS', [addOrUpdateController::class,'showCard'])->middleware(['auth','verified'])->name('showInput');

require __DIR__.'/auth.php';
