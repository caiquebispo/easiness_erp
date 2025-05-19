<?php

use App\Http\Controllers\Api\User\{All, Show, Store, ToggleUserCompanies, Update, Delete};
use Illuminate\Support\Facades\Route;

Route::get('/users', [All::class, '__invoke']);
//Route::get('/users/{id}', [Show::class, '__invoke']);
Route::post('/users', [Store::class, '__invoke']);
Route::put('/users/{id}', [Update::class, '__invoke']);
Route::delete('/users/{id}', [Delete::class, '__invoke']);
Route::post('/users/toggle', [ToggleUserCompanies::class, '__invoke']);
