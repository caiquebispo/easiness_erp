<?php


use App\Http\Controllers\Api\Category\{All, Show, Store, Update, Delete};

Route::get('/categories', [All::class, '__invoke']);
Route::get('/categories/{id}', [Show::class, '__invoke']);
Route::post('/categories', [Store::class, '__invoke']);
Route::put('/categories/{id}', [Update::class, '__invoke']);
Route::delete('/categories/{id}', [Delete::class, '__invoke']);

