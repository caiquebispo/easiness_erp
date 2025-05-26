<?php

namespace App\Http\Controllers\Api\User;

use App\DTOs\UserDto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Store extends Controller
{
    public function __construct(
        protected \App\Services\UserService $userService
    )
    {}

    public function __invoke(Request $request)
    {
        try {
            $response = $this->userService->store(UserDto::make(...$request->all()));

            return response()->json([
                'success' => true,
                'message' => 'User created successfully',
                'data' => $response
            ], 201);

        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'data' => []
            ], $e->getCode());
        }
    }
}
