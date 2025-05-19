<?php

namespace App\Http\Controllers\Api\Profiles;

use App\Http\Controllers\Controller;
use App\Services\ProfileService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ToggleProfileUser extends Controller
{
    public function __construct(
        protected ProfileService $profileService
    )
    {}

    public function __invoke(Request $request): JsonResponse
    {
        try {

            $response  = $this->profileService->toggle($request->profile_id,$request->user_id);

            return response()->json([
                'success'=> true,
                'message' => 'Relationship successfully in between user and the profile',
                'data' =>  $response
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
