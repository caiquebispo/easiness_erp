<?php

namespace App\Http\Controllers\Api\Profiles;

use App\Http\Controllers\Controller;
use App\Services\ProfileService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class Delete extends Controller
{
    public function __construct(
        protected ProfileService $profileService
    )
    {}

    public function __invoke(int $id): JsonResponse
    {
        try {

            $this->profileService->delete($id);

            return  response()->json([
                'success' => true,
                'message' => 'Profiles Deleted Successfully',
                'data' => []
            ], 200);

        }catch (\Throwable $e){

            return  response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'data' => []
            ], $e->getCode());
        }
    }
}
