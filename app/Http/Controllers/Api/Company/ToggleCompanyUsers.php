<?php

namespace App\Http\Controllers\Api\Company;

use App\Http\Controllers\Controller;
use App\Services\CompanyService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ToggleCompanyUsers extends Controller
{
    public function __construct(
        protected CompanyService $companyService
    )
    {}
    public function __invoke(Request $request): JsonResponse
    {
        try {

            $response = $this->companyService->toggle($request->company_id, $request->user_id);

            return response()->json([
                'success' => true,
                'message' => 'Relationship successfully in between company and the user',
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
