<?php


use App\Http\Controllers\Api\Permissions\{All, Show, Store, TogglePermissionProfile, Update, Delete};

Route::get('/permissions', [All::class, '__invoke']);
Route::get('/permissions/{id}', [Show::class, '__invoke']);
Route::post('/permissions', [Store::class, '__invoke']);
Route::put('/permissions/{id}', [Update::class, '__invoke']);
Route::delete('/permissions/{id}', [Delete::class, '__invoke']);
Route::post('/permissions/toggle', [TogglePermissionProfile::class, '__invoke']);
