<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\addOrUpdateController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout'); 
});
Route::middleware('auth','verified')->group(function () {
                // send selected data
    Route::post('sendData', [DataController::class, 'store'])
                ->name('sendData');
    Route::post('deleteDataDash/{data:id}', [DataController::class, 'destroy'])
                ->name('deleteDataDash');   
    Route::post('selectByDate', [DataController::class, 'select'])->name('select');     
    Route::post('tambahCard/tc', [MainController::class, 'store'])->name('inputMSTambah');     
    Route::post('adjustStock/stock/{main:id}', [MainController::class, 'stock'])->name('stock');     
    Route::post('adjustStock00/stock/{main:id}', [addOrUpdateController::class, 'stock'])->name('stock');     
    Route::post('buktiStock', [addOrUpdateController::class, 'store'])->name('stockStore');     
    Route::get('tambahOrUpdate', [addOrUpdateController::class, 'show'])->name('tambahOrUpdate');     
    Route::post('deleteTOU/{id}', [addOrUpdateController::class, 'destroy'])
    ->name('deleteTOU'); 
    Route::post('selectByDateTOU', [addOrUpdateController::class, 'select'])->name('selectTOU');   
    Route::post('inputMSTambah', [addOrUpdateController::class, 'storeCard'])->name('inputMSTambah');   
    Route::post('deleteCard/{id}', [MainController::class, 'destroy'])->name('deleteCard');    
});
