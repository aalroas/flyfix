<?php

use Tabuna\Breadcrumbs\Trail;
use App\Domains\Auth\Models\User;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Frontend\User\ProfileController;

// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('admin.dashboard'));
    });




Route::get('dashboard2', [DashboardController::class, 'index2'])
  ->name('dashboard2')
  ->breadcrumbs(function (Trail $trail) {
    $trail->push(__('Home'), route('admin.dashboard2'));
  });




Route::post('dashboard2/ajax_request', [DashboardController::class, 'ajax_request'])->name('ajax_request');
Route::post('user/preferences/update', [ProfileController::class, 'update_preferences'])->name('user.update_preferences');
