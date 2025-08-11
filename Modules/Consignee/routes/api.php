<?php

use Illuminate\Support\Facades\Route;
use Modules\Consignee\Http\Controllers\ConsigneeController;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/consignees', [ConsigneeController::class, 'index']);
    Route::post('/consignees', [ConsigneeController::class, 'store']);
    Route::get('/consignees/{id}', [ConsigneeController::class, 'show']);
    Route::put('/consignees/{id}', [ConsigneeController::class, 'update']);
    Route::delete('/consignees/{id}', [ConsigneeController::class, 'destroy']);
    Route::post('/consignees/{id}/restore', [ConsigneeController::class, 'restore']);
    Route::delete('/consignees/{id}/force', [ConsigneeController::class, 'forceDelete']);
});
