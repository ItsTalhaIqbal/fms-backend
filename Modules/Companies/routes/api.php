<?php

use Modules\Companies\Http\Controllers\CompanyController;
use Modules\Companies\Http\Controllers\CompanyMetaController;


Route::middleware('auth:sanctum')->prefix('companies')->group(function () {
    Route::get('/', [CompanyController::class, 'index']);
    Route::post('/', [CompanyController::class, 'store']);
    Route::get('/{id}', [CompanyController::class, 'show']);
    Route::put('/{id}', [CompanyController::class, 'update']);
    Route::delete('/{id}', [CompanyController::class, 'destroy']);

    // ✅ Soft delete related routes
    Route::post('/{id}/restore', [CompanyController::class, 'restore']);
    Route::delete('/{id}/force-delete', [CompanyController::class, 'forceDelete']);
});
Route::middleware('auth:sanctum')->prefix('company-meta')->group(function () {
    Route::get('/', [CompanyMetaController::class, 'index']);
    Route::get('/{id}', [CompanyMetaController::class, 'show']);
    Route::post('/', [CompanyMetaController::class, 'store']);
    Route::put('/{id}', [CompanyMetaController::class, 'update']);
    Route::delete('/{id}', [CompanyMetaController::class, 'destroy']);

    // ✅ New Routes
    Route::post('/{id}/restore', [CompanyMetaController::class, 'restore']);
    Route::delete('/{id}/force-delete', [CompanyMetaController::class, 'forceDelete']);
});

