<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderEmailController;
use App\Http\Controllers\OrderReportController;

Route::get('orders', [OrderController::class, 'index']);
Route::get('orders/{id}', [OrderController::class, 'show']);
Route::post('orders', [OrderController::class, 'store']);
Route::put('orders/{id}', [OrderController::class, 'update']);
Route::delete('orders/{id}', [OrderController::class, 'destroy']);

//Send email order
Route::post('orders/{id}/sendmail', [OrderEmailController::class, 'sendmail']);

//generate pdf order
Route::post('orders/{id}/report', [OrderReportController::class, 'report']);
