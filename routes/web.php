<?php

use App\Http\Controllers\CustomerServiceController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::post('/', [UserController::class, 'store'])->name('create');
        Route::patch('/{user}/edit', [UserController::class, 'update'])->name('edit');
        Route::delete('/{user}/delete', [UserController::class, 'destroy'])->name('delete');
    });
    Route::prefix('patients')->name('patient.')->group(function () {
        Route::get('/', [PatientController::class, 'index'])->name('index');
        Route::post('/{patient}/test', [PatientController::class, 'createTest'])->name('test.create');
        Route::get('/{patient}', [PatientController::class, 'show'])->name('show');
        Route::get('/{patient}/test/{patient_test}/image', [PatientController::class, 'getTestImage'])->name('test.image');
        Route::get('/{patient}/edit', [PatientController::class, 'edit'])->name('edit');
        Route::patch('/{patient}/edit', [PatientController::class, 'update'])->name('edit');
    });
    
    Route::get('customer-service', [CustomerServiceController::class, 'index'])->name('customer-service.index');

    Route::get('settings', [SettingController::class, 'index'])->name('setting.index');
    Route::post('settings', [SettingController::class, 'store'])->name('setting.index.post');
    Route::delete('settings/sm/{scanModel}', [SettingController::class, 'smDestroy'])->name('setting.sm.delete');
    Route::delete('settings/dm/{detectionModel}', [SettingController::class, 'dmDestroy'])->name('setting.dm.delete');
});

require __DIR__.'/auth.php';
