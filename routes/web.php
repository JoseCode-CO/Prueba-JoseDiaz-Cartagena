<?php

use App\Http\Controllers\ActivityController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::prefix('activity')->group(function () {
    Route::get('/', [ActivityController::class, 'index'])->name('activity.index');
    Route::get('/create', [ActivityController::class, 'create'])->name('activity.create');
    Route::post('', [ActivityController::class, 'store'])->name('activity.store');
    Route::get('/{activity}', [ActivityController::class, 'show'])->name('activity.show');
    Route::get('/{activity}', [ActivityController::class, 'edit'])->name('activity.edit');
    Route::put('/{activity}', [ActivityController::class, 'update'])->name('activity.update');
    Route::delete('/{activity}', [ActivityController::class, 'destroy'])->name('activity.delete');
})->middleware(['auth']);
