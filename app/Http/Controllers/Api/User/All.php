<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;

class All extends Controller
{
    public function __construct(
        protected UserService $userService
    )
    {}
    public function __invoke(Request $request)
    {
        try {

            $response = $this->userService->all();

            return response()->json([
                'success' => true,
                'message' => 'Users retrieved successfully',
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
