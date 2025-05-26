<?php

namespace App\Http\Controllers\Api\User;

use App\DTOs\UserDto;
use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;

class Update extends Controller
{
    public function __construct(
        protected UserService $userService
    )
    {}
    public function __invoke(Request $request, int $id)
    {
        try {
            $response = $this->userService->update($id, UserDto::make(...$request->all()));

            return response()->json([
                'success' => true,
                'message' => 'User updated successfully',
                'data' => $response
            ], 200);

        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'data' => []
            ], $e->getCode());
        }
    }
}
