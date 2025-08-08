<?php

use Illuminate\Support\Facades\Route;
use Modules\Consignee\Http\Controllers\ConsigneeController;


Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('consignees', ConsigneeController::class);
    Route::post('consignees/{id}/restore', [ConsigneeController::class, 'restore']);
    Route::delete('consignees/{id}/force-delete', [ConsigneeController::class, 'forceDelete']);
});

