<?php

namespace App\Services;

use App\DTOs\CompanyDto;
use App\Models\Company;

class CompanyService
{
    public function __construct(
        protected UserService $userService
    )
    {}
    public function store(CompanyDto $companyDTO): Company|\Exception
    {
        try {
            return  Company::create($companyDTO->withArray());

        }catch(\Exception $e){

            throw new Exception('Internal error, please verify with our teams for more details: '.$e->getMessage(),500);
        }
    }
    public function show(int $company_id): Company
    {
        try {
            return Company::findOrFail($company_id);
        }catch (\Exception $e){
            throw new \Exception('Company Notfound',404);
        }
    }
    public function toggle(int $company_id, int $user_id):array|\Exception
    {
        $company = $this->show($company_id);
        $user = $this->userService->show($user_id);

        try {
            return $company->users()->toggle($user);
        }catch (\Exception $e){
            throw new \Exception('Internal error in method toggle',500);
        }
    }
}
