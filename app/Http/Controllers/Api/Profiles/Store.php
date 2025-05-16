<?php

namespace App\Http\Controllers\Api\Profiles;

use App\DTOs\ProfileDto;
use App\Http\Controllers\Controller;
use App\Services\ProfileService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class Store extends Controller
{
    public function __construct(
        public ProfileService $profileService
    )
    {}

    public function __invoke(Request $request): JsonResponse
    {

        try {

            $profile = $this->profileService->store(new ProfileDto(...$request->all()));

            return response()->json([
                'success' => true,
                'message' => 'Profiles Created Successfully.',
                'data' => $profile
            ],200);

        }catch (\Exception $e){

            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'data' => []
            ],$e->getCode());
        }
    }
}
