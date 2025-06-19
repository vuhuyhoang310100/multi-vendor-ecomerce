<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\VendorController;

Route::middleware(['auth', 'role:vendor'])->group(function () {
    Route::get('dashboard', [VendorController::class, 'dashboard'])->name('dashboard');
});
