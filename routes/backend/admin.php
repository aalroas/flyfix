<?php

use Tabuna\Breadcrumbs\Trail;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\DashboardController;


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




Route::get('setting', [SettingController::class, 'edit'])->name('setting.edit');
Route::post('setting',[SettingController::class, 'updateSiteInfo'])->name('setting.UpdateSiteInfo');

