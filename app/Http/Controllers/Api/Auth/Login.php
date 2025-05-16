<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;

class Login extends Controller
{
    public function __construct(
        protected AuthService $authService
    )
    {}
    public function __invoke(LoginRequest $request)
    {
        return $this->authService->attempt(...$request->validated());
    }
}
