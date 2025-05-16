<?php

namespace App\Http\Controllers\Api\Permissions;

use App\DTOs\PermissionsDto;
use App\Http\Controllers\Controller;
use App\Services\PermissionsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class Store extends Controller
{
    public function __construct(
        protected PermissionsService $permissionsService
    )
    {}

    public function __invoke(Request $request): JsonResponse
    {
        try {

            $permission = $this->permissionsService->store(new PermissionsDto(...$request->all()));

            return response()->json([
                'success' => true,
                'message' => 'Permissions Created Successfully',
                'data' => $permission
            ], 200);

        }catch (\Exception $e){

            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'data' => []
            ], $e->getCode());
        }
    }
}
