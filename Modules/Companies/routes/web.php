<?php

use Illuminate\Support\Facades\Route;
use Modules\Companies\Http\Controllers\CompaniesController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('companies', CompanyController::class)->names('companies');
});
