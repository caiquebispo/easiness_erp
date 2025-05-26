<?php

namespace App\Http\Controllers\Api\Auth;

use App\DTOs\UserDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class Register extends Controller
{
    public function __construct(
        protected  UserService $userService
    )
    {}
    public function __invoke(RegisterRequest $request)
    {
        try {

            $response = $this->userService->store(UserDto::make(...$request->validated()));

            return response()->json([
                'success' => true,
                'message' => 'Registered successfully',
                'data' => $response
            ],200);

        }catch (\Throwable $e){

            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'data' => []
            ],$e->getCode());
        }

    }
}
