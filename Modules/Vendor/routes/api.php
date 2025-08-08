<?php

use Illuminate\Support\Facades\Route;
use Modules\Vendor\Http\Controllers\VendorController;

Route::middleware(['auth:sanctum'])->prefix('vendor')->group(function () {
    Route::get('/', [VendorController::class, 'index']);
    Route::post('/', [VendorController::class, 'store']);
    Route::get('/{id}', [VendorController::class, 'show']);
    Route::put('/{id}', [VendorController::class, 'update']);
    Route::delete('/{id}', [VendorController::class, 'destroy']);

    // Soft delete features
    Route::post('/{id}/restore', [VendorController::class, 'restore']);
    Route::delete('/{id}/force-delete', [VendorController::class, 'forceDelete']);
});

