<?php

use Illuminate\Support\Facades\Route;
use Modules\Port\Http\Controllers\PortController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('ports', PortController::class)->names('port');
});
