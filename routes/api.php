<?php

use App\Http\Controllers\Api\Profiles\{Update,Show,Delete,All,Store};
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\{Login, Logout, Register};


Route::prefix('v1/erp')->group(function(){

    Route::post('/companies', [Store::class, '__invoke']);

    //Profiles
    Route::get('/profiles', [All::class, '__invoke']);
    Route::get('/profiles/{id}', [Show::class, '__invoke']);
    Route::post('/profiles', [Store::class, '__invoke']);
    Route::put('/profiles/{id}', [Update::class, '__invoke']);
    Route::delete('/profiles/{id}', [Delete::class, '__invoke']);

});

Route::prefix('v1/auth')->group(function(){

   Route::post('/login', [Login::class,'__invoke']);
   Route::post('/register', [Register::class,'__invoke']);
   Route::post('/logout', [Logout::class,'__invoke']);

});

