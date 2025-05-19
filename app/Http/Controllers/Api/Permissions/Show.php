<?php

namespace App\Http\Controllers\Api\Permissions;

use App\Http\Controllers\Controller;
use App\Services\PermissionsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class Show extends Controller
{
    public function __construct(
        protected PermissionsService $permissionsService
    )
    {}
    public function __invoke(int $id): JsonResponse
    {
        try {

            $permission = $this->permissionsService->get($id);

            return  response()->json([
                'success' => true,
                'message' => 'Permission Retrieving Successfully',
                'data' => $permission
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
