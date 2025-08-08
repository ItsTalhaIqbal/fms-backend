<?php

use Illuminate\Support\Facades\Route;
use Modules\Shipper\Http\Controllers\ShipperController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('shippers', ShipperController::class)->names('shipper');
});
