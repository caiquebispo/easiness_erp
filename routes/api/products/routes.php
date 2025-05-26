<?php

use App\Http\Controllers\Api\Product\{All, Show, Store,Update, Delete};

Route::get('/products', [All::class, '__invoke']);
Route::get('/products/{id}', [Show::class, '__invoke']);
Route::post('/products', [Store::class, '__invoke']);
Route::put('/products/{id}', [Update::class, '__invoke']);
Route::delete('/products/{id}', [Delete::class, '__invoke']);

