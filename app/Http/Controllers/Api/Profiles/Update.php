<?php

namespace App\Http\Controllers\Api\Profiles;

use App\DTOs\ProfileDto;
use App\Http\Controllers\Controller;
use App\Services\ProfileService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class Update extends Controller
{
    public function __construct(
        protected ProfileService $profileService
    )
    {}

    public function __invoke(Request $request, int $id): JsonResponse
    {
        try {

            $profile = $this->profileService->update($id, new ProfileDto(...$request->all()));

            return response()->json([
                'success' => true,
                'message' => 'Profile updated successfully',
                'data' => $profile
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
