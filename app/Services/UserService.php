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

            throw new \Exception('Internal error, please verify with our team support more details: '.$e->getMessage(), 500);

        }
    }
}
