<?php

use Illuminate\Support\Facades\Route;
use Modules\Shipper\Http\Controllers\ShipperController;

Route::middleware(['auth:sanctum'])->prefix('shippers')->group(function () {
    Route::get('/', [ShipperController::class, 'index']);
    Route::post('/', [ShipperController::class, 'store']);
    Route::get('/{id}', [ShipperController::class, 'show']);
    Route::put('/{id}', [ShipperController::class, 'update']);
    Route::delete('/{id}', [ShipperController::class, 'destroy']);
    Route::post('/{id}/restore', [ShipperController::class, 'restore']);
    Route::delete('/{id}/force-delete', [ShipperController::class, 'forceDelete']);
});
