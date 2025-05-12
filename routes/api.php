<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\{Login, Logout, Register};

Route::prefix('v1/auth')->group(function(){

   Route::post('/login', [Login::class,'__invoke']);
   Route::post('/register', [Register::class,'__invoke']);
   Route::post('/logout', [Logout::class,'__invoke']);

});
