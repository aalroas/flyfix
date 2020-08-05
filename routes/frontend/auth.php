<?php

use App\Domains\Auth\Http\Controllers\Frontend\Auth\ConfirmPasswordController;
use App\Domains\Auth\Http\Controllers\Frontend\Auth\ForgotPasswordController;
use App\Domains\Auth\Http\Controllers\Frontend\Auth\LoginController;
use App\Domains\Auth\Http\Controllers\Frontend\Auth\PasswordExpiredController;
use App\Domains\Auth\Http\Controllers\Frontend\Auth\ResetPasswordController;
use App\Domains\Auth\Http\Controllers\Frontend\Auth\UpdatePasswordController;
use App\Domains\Auth\Http\Controllers\Frontend\Auth\VerificationController;
/*
 * Frontend Access Controllers
 * All route names are prefixed with 'frontend.auth'.
 */
Route::group(['as' => 'auth.'], function () {
    Route::group(['middleware' => 'auth'], function () {
        // Authentication
        Route::post('logout', [LoginController::class, 'logout'])->name('logout');

        // Password expired routes
        Route::get('password/expired', [PasswordExpiredController::class, 'expired'])->name('password.expired');
        Route::patch('password/expired', [PasswordExpiredController::class, 'update'])->name('password.expired.update');

        // These routes can not be hit if the password is expired
        Route::group(['middleware' => 'password.expires'], function () {
            // E-mail Verification
            Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
            Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
            Route::post('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');

            // These routes require the users email to be verified
            Route::group(['middleware' => config('kodatik.access.middleware.verified')], function () {
                // Passwords
                Route::get('password/confirm', [ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
                Route::post('password/confirm', [ConfirmPasswordController::class, 'confirm']);

                Route::patch('password/update', [UpdatePasswordController::class, 'update'])->name('password.change');

            });
        });
    });

    Route::group(['middleware' => 'guest'], function () {
        // Authentication
        Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
        Route::post('login', [LoginController::class, 'login']);


        // Password Reset
        Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
        Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
        Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
        Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

    });
});
