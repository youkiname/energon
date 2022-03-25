<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TaskController as PlannerController;
use App\Http\Controllers\AlertController;
use App\Http\Controllers\SettingController;
use App\Models\Company;
use App\Models\City;
use App\Models\Task;
use App\Models\Comment;
use App\Models\Event;

Route::get('/', function () {
    return redirect('/companies');
});

Route::middleware(['auth'])->group(function () {
    

    Route::get('/companies/check-available', [CompanyController::class, 'check'])
        ->middleware(['auth'])->name('companies.check');

    Route::resource('companies', CompanyController::class)
        ->middleware(['auth']);

    Route::get('companies/{company}/contacts', [CompanyController::class, 'contacts'])
        ->middleware(['auth'])->name('companies.contacts');

    Route::get('companies/{company}/tasks', [CompanyController::class, 'tasks'])
        ->middleware(['auth'])->name('companies.tasks');

    Route::get('companies/{company}/bundle', [CompanyController::class, 'bundle'])
        ->name('companies.bundle');

    Route::post('companies/{company}/bundle', [CompanyController::class, 'binding'])
        ->name('companies.binding');

    Route::resource('contacts', ContactController::class);

    Route::post('/events/add', [EventController::class, 'store'])
        ->name('events.add');

    Route::post('tasks/{task}/go', [TaskController::class, 'go'])->name('tasks.go');
    Route::resource('tasks', TaskController::class);

    Route::get('stats', function () {
        return view('stats.index');
    })->name('stats.index');

    Route::get('alerts', [AlertController::class, 'index'])->name('alerts.index');

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
