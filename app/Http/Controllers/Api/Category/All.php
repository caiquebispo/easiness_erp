<?php

namespace App\Http\Controllers\Api\Category;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class All extends Controller
{
    public function __construct(
        protected CategoryService $categoryService
    )
    {}

    public function __invoke(Request $request): JsonResponse
    {
        try {
            $categories = $this->categoryService->all();

            return response()->json([
                'success' => true,
                'message' => 'Categories retrieved successfully',
                'data' => $categories
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
