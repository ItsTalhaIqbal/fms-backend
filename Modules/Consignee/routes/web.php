<?php

use Illuminate\Support\Facades\Route;
use Modules\Consignee\Http\Controllers\ConsigneeController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('consignees', ConsigneeController::class)->names('consignee');
});
