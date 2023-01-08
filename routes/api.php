<?php

use App\Http\Controllers\Api\V1\ActivityController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1/activity')->group(function () {
    Route::get('/', [ActivityController::class, 'index'])->name('api.activity.index');
    Route::get('/create', [ActivityController::class, 'create'])->name('api.activity.create');
    Route::post('', [ActivityController::class, 'store'])->name('api.activity.store');
    Route::get('/{activity}', [ActivityController::class, 'show'])->name('api.activity.show');
    Route::put('/{activity}', [ActivityController::class, 'update'])->name('api.activity.update');
    Route::delete('/{activity}', [ActivityController::class, 'destroy'])->name('api.activity.delete');
});
