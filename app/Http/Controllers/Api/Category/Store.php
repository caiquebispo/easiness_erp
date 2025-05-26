<?php

namespace App\Http\Controllers\Api\Category;

use App\DTOs\CategoryDto;
use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class Store extends Controller
{
    public function __construct(
        protected CategoryService $categoryService
    )
    {}

    public function __invoke(Request $request): JsonResponse
    {
        try {

            $category = $this->categoryService->store(CategoryDto::make(...$request->all()));

            return response()->json([
                'success' => true,
                'message' => 'Category created successfully',
                'data' => $category
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
