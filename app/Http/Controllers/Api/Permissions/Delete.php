<?php

namespace App\Http\Controllers\Api\Permissions;

use App\Http\Controllers\Controller;
use App\Services\PermissionsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class Delete extends Controller
{
    public function __construct(
        protected  PermissionsService $permissionsService
    ){}

    public function __invoke(int $id): JsonResponse
    {
        try {

            $this->permissionsService->delete($id);

            return  response()->json([
                'success' => true,
                'message' => 'Permission deleted Successfully',
                'data' => []
            ],200);

        }catch (\Exception $e){

            return  response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'data' => []
            ],$e->getCode());
        }
    }
}
