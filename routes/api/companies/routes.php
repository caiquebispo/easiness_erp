<?php


use App\Http\Controllers\Api\Company\{Store, ToggleCompanyUsers};

Route::post('/companies', [Store::class, '__invoke']);
Route::post('/companies/toggle', [ToggleCompanyUsers::class, '__invoke']);
