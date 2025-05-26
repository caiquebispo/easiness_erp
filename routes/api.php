<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\{Login, Logout, Register};

Route::prefix('v1/erp')->group(function(){

    require_once('api/companies/routes.php');
    require_once('api/profiles/routes.php');
    require_once('api/permissions/routes.php');
    require_once('api/users/routes.php');
    require_once('api/categories/routes.php');
    require_once('api/products/routes.php');

});

Route::prefix('v1/auth')->group(function(){
   Route::post('/login', [Login::class,'__invoke']);
   Route::post('/register', [Register::class,'__invoke']);
   Route::post('/logout', [Logout::class,'__invoke']);
});

