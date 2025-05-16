<?php

namespace App\Services;

use App\DTOs\CompanyDto;
use App\Models\Company;

class CompanyService
{
    public function store(CompanyDto $companyDTO): Company|\Exception
    {
        try {
            return  Company::create($companyDTO->withArray());

        }catch(\Exception $e){

            throw new Exception('Internal error, please verify with our teams for more details: '.$e->getMessage(),500);
        }
    }
}
