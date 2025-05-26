<?php

namespace App\Http\Controllers\Api\Permissions;

use App\DTOs\PermissionsDto;
use App\Http\Controllers\Controller;
use App\Services\PermissionsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class Update extends Controller
{
    public function __construct(
        protected  PermissionsService $permissionsService
    )
    {}

    public function __invoke(Request $request, int $id)
    {
        try {

            $permission = $this->permissionsService->update($id,PermissionsDto::make(...$request->all()));

            return  response()->json([
                'success' => true,
                'message' => 'Permission Updated Successfully',
                'data' => $permission
            ],200);

        }catch (\Throwable $e){

            return  response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'data' => []
            ],$e->getCode());
        }
    }
}
