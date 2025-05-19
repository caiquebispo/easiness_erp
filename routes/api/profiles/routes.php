<?php

use App\Http\Controllers\Api\Profiles\{All, Show, Store, ToggleProfileUser, Update, Delete};

Route::get('/profiles', [All::class, '__invoke']);
Route::get('/profiles/{id}', [Show::class, '__invoke']);
Route::post('/profiles', [Store::class, '__invoke']);
Route::put('/profiles/{id}', [Update::class, '__invoke']);
Route::delete('/profiles/{id}', [Delete::class, '__invoke']);
Route::post('/profiles/toggle', [ToggleProfileUser::class, '__invoke']);

