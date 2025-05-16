<?php

namespace App\Http\Controllers\Api\Permissions;

use App\Http\Controllers\Controller;
use App\Services\PermissionsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class All extends Controller
{
    public function __construct(
        protected  PermissionsService $permissionsService
    ){}

    public function __invoke(): JsonResponse
    {
        try {

            $permission = $this->permissionsService->all();

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
