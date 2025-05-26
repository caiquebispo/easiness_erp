<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class Delete extends Controller
{
    public function __construct(
        protected ProductService $productService
    )
    {}

    public function __invoke(int $id): JsonResponse
    {
        try {

            $this->productService->delete($id);

            return response()->json([
                'success' => true,
                'message' => 'Product deleted successfully',
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
