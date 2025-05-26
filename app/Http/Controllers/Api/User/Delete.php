<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;

class Delete extends Controller
{
    public function __construct(
        protected UserService $userService
    )
    {}
    public function __invoke(Request $request, int $id)
    {
        try {
            $this->userService->delete($id);

            return response()->json([
                'success' => true,
                'message' => 'User deleted successfully',
                'data' => []
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
