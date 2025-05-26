<?php

namespace App\Http\Controllers\Api\Product;

use App\DTOs\ProductDto;
use App\Http\Controllers\Controller;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class Store extends Controller
{
    public function __construct(
        protected ProductService $productService
    )
    {}

    public function __invoke(Request $request): JsonResponse
    {
        try {
            $response = $this->productService->store(ProductDto::make(...$request->all()));

            return response()->json([
                'success' => true,
                'message' => 'Product created successfully',
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
