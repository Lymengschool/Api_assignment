<?php

use App\Http\Controllers\ProductController;
use Illuminate\Routing\Route;

Route::prefix('v1')->group(function () {
    // Retrieve all products
    Route::get('/products', [ProductController::class, 'index']);

    // Create a new product
    Route::post('/products', [ProductController::class, 'store']);

    // Retrieve a specific product
    Route::get('/products/{product}', [ProductController::class, 'show']);

    // Update a specific product
    Route::put('/products/{product}', [ProductController::class, 'update']);

    // Delete a specific product
    Route::delete('/products/{product}', [ProductController::class, 'destroy']);
});
