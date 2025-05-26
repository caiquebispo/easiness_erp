<?php

namespace App\Services;

use App\DTOs\UserDto;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserService
{
    public function store(UserDto $user)
    {
        try{
            return User::create($user->toArray());
        }catch (\Throwable $e){
            throw new \Exception('Internal error in create an new user, please verify with our team support more details:',500);
        }
    }
    public function all(): Collection|\Exception
    {
        try {
            return User::all();
        }catch (\Throwable $e){
            throw new \Exception('Internal error in get all users, please verify with our team support more details:',500);
        }
    }
    public function get(int $user_id): User|\Exception
    {
        try {
            return  User::findOrFail($user_id);
        }catch (\Throwable $e){
            throw new \Exception('User Notfound', 404);
        }
    }
    public function update(int $user_id, UserDto $user): User|\Exception
    {
        $user = $this->get($user_id);
        try {
            $user->update($user->toArray());
            return $user;
        }catch (\Throwable $e){
            throw new \Exception('Internal error in update user, please verify with our team support more details:',500);
        }
    }
    public function delete(int $user_id):bool|\Exception
    {
        $user = $this->get($user_id);
        try {
            return $user->delete();
        }catch (\Throwable $e){
            throw new \Exception('Internal error in delete user, please verify with our team support more details:',500);
        }
    }
    public function toggle(int $user_id, $company_id):array|\Exception
    {
        $user = $this->get($user_id);
        $company = (new CompanyService($this))->get($company_id);

        try {
            return $user->companies()->toggle($company);
        }catch (\Throwable $e){
            throw new \Exception('Internal error in method toggle',500);
        }
    }
    public function associate(int $user_id, $company_id):User|\Exception
    {
        $user = $this->get($user_id);
        $company = (new CompanyService($this))->get($company_id);

        try {
             $user->company()->associate($company)->save();
             return $user;

        }catch (\Throwable $e){
            throw new \Exception('Internal error in method toggle: ',500);
        }
    }
}
