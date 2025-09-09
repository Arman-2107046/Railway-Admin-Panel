<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Api\NewsletterController;
use App\Http\Controllers\Api\ProductController;

use App\Http\Controllers\Api\ClientController;

use App\Http\Controllers\Api\ManagementController;

Route::get('/management', [ManagementController::class, 'index']);






Route::get('/clients', [ClientController::class, 'index']);

Route::get('/products', [ProductController::class, 'index']); // GET all products
Route::get('/products/{id}', [ProductController::class, 'show']); // GET single product



Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe']);


Route::post('/send-email', [ContactController::class, 'sendEmail']);

Route::prefix('news')->group(function () {
    Route::get('/', [NewsController::class, 'index']);      // All news
    Route::get('/{id}', [NewsController::class, 'show']);  // Single news
});
