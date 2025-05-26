<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitController;

Route::get('/', [VisitController::class, 'index'])->name('visits.index');
Route::post('/visits', [VisitController::class, 'store'])->name('visits.store');
