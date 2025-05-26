<?php

namespace App\Http\Controllers\Api\Category;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class Delete extends Controller
{
    public function __construct(
        protected CategoryService $categoryService
    )
    {}
    public function __invoke(int $id): JsonResponse
    {
        try {
            $this->categoryService->delete($id);

            return response()->json([
                'success' => true,
                'message' => 'Category deleted successfully',
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
