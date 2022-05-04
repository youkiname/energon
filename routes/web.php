<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyBundleController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TaskController as PlannerController;
use App\Http\Controllers\AlertController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StatsController;
use App\Http\Controllers\ConfirmationController;

Route::get('/', function () {
    return redirect('/companies');
});

Route::middleware(['auth'])->group(function () {
    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');

    Route::post('/companies/bundle', [CompanyController::class, 'bundle'])
    ->name('companies.bundle')->middleware('role_rights:company');
    Route::get('/companies/{company}/contacts', [CompanyController::class, 'contacts'])
    ->name('companies.contacts')->middleware('role_rights:company');
    Route::get('/companies/{company}/tasks', [CompanyController::class, 'tasks'])
    ->name('companies.tasks')->middleware('role_rights:company');
    Route::resource('companies', CompanyController::class)->middleware('role_rights:company');

    Route::resource('employee', EmployeeController::class)->middleware('role_rights:employee');

    Route::resource('contacts', ContactController::class);

    Route::post('/events/store', [EventController::class, 'store'])->name('events.store');

    Route::resource('tasks', TaskController::class)->middleware('role_rights:task');

    Route::get('stats', [StatsController::class, 'index'])->name('stats.index');

    Route::resource('notifications', NotificationController::class);

    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [SettingController::class, 'store'])->name('settings.store');

    Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');

        Route::get('/users/trash', [UserController::class, 'trash'])->name('users.trash');
        Route::post('/users/{user}/restore', [UserController::class, 'restore'])->name('users.restore');
        Route::resource('users', UserController::class);

        Route::resource('roles', RoleController::class);
    });

    Route::middleware(['main_manager'])->group(function () {
        Route::post('/bundles/confirm/{company}/{another}', [CompanyBundleController::class, 'confirm'])->name('bundles.confirm');
        Route::delete('/bundles/destroy/{company}/{another}', [CompanyBundleController::class, 'destroy'])->name('bundles.destroy');
        
        Route::put('confirmations/confirm/{confirmation}/', [ConfirmationController::class, 'confirm'])->name('confirmations.confirm');
        Route::resource('confirmations', ConfirmationController::class);
    });

});

require __DIR__ . '/json.php';

require __DIR__ . '/auth.php';
