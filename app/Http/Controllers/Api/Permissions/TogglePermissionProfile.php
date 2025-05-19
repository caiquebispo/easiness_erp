<?php

namespace App\Http\Controllers\Api\Permissions;

use App\Http\Controllers\Controller;
use App\Services\PermissionsService;
use Illuminate\Http\Request;

class TogglePermissionProfile extends Controller
{
    public function __construct(
        protected PermissionsService $permissionsService
    )
    {}

    public function __invoke(Request $request)
    {
        try {

            $this->permissionsService->toggle($request->permission_id,$request->profile_id);

            return response()->json([
                'success'=> true,
                'message' => 'Relationship successfully in between permission and the profile',
                'data' => []
            ], 202);

        }catch (\Exception $e){

            return response()->json([
                'success'=> false,
                'message' => $e->getMessage(),
                'data' => []
            ], $e->getCode());
        }
    }
}
