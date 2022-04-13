<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\CompanyController;
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

Route::get('/', function () {
    return redirect('/companies');
});

Route::middleware(['auth'])->group(function () {

    Route::post('/companies/bundle', [CompanyController::class, 'bundle'])
    ->name('companies.bundle');
    Route::get('/companies/{company}/contacts', [CompanyController::class, 'contacts'])
    ->name('companies.contacts');
    Route::get('/companies/{company}/tasks', [CompanyController::class, 'tasks'])
    ->name('companies.tasks');
    Route::resource('companies', CompanyController::class);

    Route::resource('employee', EmployeeController::class)
    ->middleware(['auth']);

    Route::resource('contacts', ContactController::class);

    Route::post('/events/store', [EventController::class, 'store'])
        ->name('events.store');

    Route::resource('tasks', TaskController::class);

    Route::get('stats', function () {
        return view('stats.index');
    })->name('stats.index');

    Route::resource('notifications', NotificationController::class);

    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [SettingController::class, 'store'])->name('settings.store');

    Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {

        Route::get('/', [AdminController::class, 'index'])->name('index');

        Route::get('/users/trash', [UserController::class, 'trash'])->name('users.trash');
        Route::post('/users/{user}/restore', [UserController::class, 'restore'])->name('users.restore');
        Route::resource('users', UserController::class);

        Route::resource('roles', RoleController::class);

        Route::resource('tasks', PlannerController::class);

    });

});

require __DIR__ . '/json.php';

require __DIR__ . '/auth.php';
