<?php

namespace App\Services;

use App\DTOs\UserDto;
use App\Models\User;

class UserService
{
    public function store(UserDto $user)
    {
        try{
            return User::create($user->withPassword()->withArray());
        }catch (\Exception $e){
            throw new \Exception('Internal error in create an new user, please verify with our team support more details:',500);
        }
    }
    public function show(int $user_id): User|\Exception
    {
        try {
            return  User::findOrFail($user_id);
        }catch (\Exception $e){
            throw new \Exception('User Notfound', 404);
        }
    }
    public function toggle(int $user_id, $company_id):array|\Exception
    {
        $user = $this->show($user_id);
        $company = (new CompanyService($this))->show($company_id);

        try {
            return $user->companies()->toggle($company);
        }catch (\Exception $e){
            throw new \Exception('Internal error in method toggle',500);
        }
    }
    public function associate(int $user_id, $company_id):User|\Exception
    {
        $user = $this->show($user_id);
        $company = (new CompanyService($this))->show($company_id);

        try {
             $user->company()->associate($company)->save();
             return $user;

        }catch (\Exception $e){
            throw new \Exception('Internal error in method toggle: '.$e->getMessage(),500);
        }
    }
}
