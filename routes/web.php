<?php

use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
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

    Route::prefix('patient')->name('patient.')->group(function () {
        Route::get('/', [PatientController::class, 'index'])->name('index');
        Route::post('/{patient}/test', [PatientController::class, 'createTest'])->name('test.create');
        Route::get('/{patient}', [PatientController::class, 'show'])->name('show');
        Route::get('/{patient}/edit', [PatientController::class, 'edit'])->name('edit');
        Route::patch('/{patient}/edit', [PatientController::class, 'update'])->name('edit');
    });
    
    Route::get('settings', [SettingController::class, 'index'])->name('setting.index');
    Route::post('settings', [SettingController::class, 'store'])->name('setting.index.post');
    Route::delete('settings/sm/{scanModel}', [SettingController::class, 'smDestroy'])->name('setting.sm.delete');
    Route::delete('settings/dm/{detectionModel}', [SettingController::class, 'dmDestroy'])->name('setting.dm.delete');
});

require __DIR__.'/auth.php';
