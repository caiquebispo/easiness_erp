<?php

namespace App\Http\Controllers\Api\Company;

use App\DTOs\CompanyDto;
use App\Http\Controllers\Controller;
use App\Services\CompanyService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Store extends Controller
{
    public function __construct(
        protected CompanyService $companyService
    )
    {}

    public function __invoke(Request $request): JsonResponse
    {

        try {

            $company = $this->companyService->store(new CompanyDto(...$request->all()));

            return response()->json([
                'success' => true,
                'message' => 'Successfully Company created',
                'data' => $company
            ],Response::HTTP_CREATED);
        }catch (\Exception $e){

            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'data' => []
            ],$e->getCode());
        }
    }
}
