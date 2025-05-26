<?php

namespace App\Http\Controllers\Api\Product;

use App\DTOs\ProductDto;
use App\Http\Controllers\Controller;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class Update extends Controller
{
    public function __construct(
        protected ProductService $productService
    )
    {}

    public function __invoke(Request $request, int $id): JsonResponse
    {
        try {
            $response = $this->productService->update($id, ProductDto::make(...$request->all()));

            return response()->json([
                'success' => true,
                'message' => 'Product updated successfully',
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
