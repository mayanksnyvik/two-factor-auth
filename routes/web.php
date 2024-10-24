<?php
use Illuminate\Support\Facades\Route;
use Mayanksnyvik\TwoFactorAuth\Http\Controllers\Auth\OtpController;



Route::middleware(['guest','web'])->group(function(){
    Route::get('/validate_2fa', [OtpController::class, 'indexAction'])->name('2fa');
    Route::post('/verify_2fa', [OtpController::class, 'verifyAction'])->name('2fa.verify');
    Route::post('/validate_2fa/resend', [OtpController::class, 'resendAction'])->name('2fa.resend');
});