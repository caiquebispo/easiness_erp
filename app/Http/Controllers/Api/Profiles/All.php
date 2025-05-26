<?php

namespace App\Http\Controllers\Api\Profiles;

use App\Http\Controllers\Controller;
use App\Services\ProfileService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class All extends Controller
{
    public function __construct(
        protected ProfileService $profileService
    )
    {}
    public function __invoke(): JsonResponse
    {
        try {

            $profiles = $this->profileService->all();

            return response()->json([
                'success' => true,
                'message' => 'Profiles Retrieving Successfully.',
                'data' => $profiles
            ],200);

        }catch (\Throwable $e){

            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'data' => []
            ],$e->getCode());
        }
    }
}
