<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Auth;

class Logout extends Controller implements HasMiddleware
{
    public function __construct(
        protected  AuthService $authService
    )
    {}
    public static function middleware(): array
    {
        return [
            'auth:sanctum'
        ];
    }

    public function __invoke()
    {
        try {

            return $this->authService->logout();

        }catch(\Throwable $e){

            return $e->getMessage();
        }
    }
}
