<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;

class AssociateUserCompany extends Controller
{
    public function __construct(
        protected UserService $userService
    )
    {}
    public function __invoke(Request $request)
    {
        try {

            $response = $this->userService->associate($request->user_id, $request->company_id);

            return response()->json([
                'success' => true,
                'message' => 'Successfully',
                'data' => $response
            ], 202);

        }catch (\Exception $e){

            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'data' => []
            ], $e->getCode());
        }

    }
}
