<?php

use Illuminate\Support\Facades\Route;
use Modules\Port\Http\Controllers\PortController;

Route::middleware('auth:sanctum')->prefix('ports')->group(function () {
    Route::get('/', [PortController::class, 'index']);
    Route::post('/', [PortController::class, 'store']);
    Route::get('/{id}', [PortController::class, 'show']);
    Route::put('/{id}', [PortController::class, 'update']);
    Route::delete('/{id}', [PortController::class, 'destroy']);

    // Soft deletes
    Route::get('/deleted/list', [PortController::class, 'deleted']);
    Route::post('/{id}/restore', [PortController::class, 'restore']);
    Route::delete('/{id}/force-delete', [PortController::class, 'forceDelete']);
});
