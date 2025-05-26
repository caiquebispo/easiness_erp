<?php

namespace App\Http\Controllers\Api\Profiles;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Services\ProfileService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class Show extends Controller
{
    public function __construct(
        protected ProfileService $profileService
    )
    {}
    public function __invoke(int $id): JsonResponse
    {
        try {

            $profile = $this->profileService->get($id);

            return response()->json([
                'success' => true,
                'message' => 'Profile Retrieving Successfully',
                'data' => $profile
            ], 200);

        }catch (\Throwable $e){

            return response()->json([
                'success'=> false,
                'message' => $e->getMessage(),
                'data' => []
            ], $e->getCode());
        }
    }
}
