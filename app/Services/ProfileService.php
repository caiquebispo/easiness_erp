<?php

namespace App\Services;

use App\DTOs\ProfileDto;
use App\Models\Profile;

class ProfileService
{
    public function __construct(
        protected UserService $userService
    )
    {}
    public function all()
    {
        return Profile::all();
    }
    public function get(int $profile_id): Profile|\Exception
    {
        try {
            return  Profile::findOrFail($profile_id);

        }catch (\Throwable $e){
            throw new \Exception('Profile Notfound', 404);
        }
    }

    public function store(ProfileDto $profileDto): Profile|\Exception
    {
        try {

            return  Profile::create($profileDto->toArray());

        }catch (\Throwable $e){

            throw new \Exception('Internal error please verify with our support for more information.'.$e->getMessage(), 500);
        }
    }
    public function update(int $profile_id, ProfileDto $profileDto):Profile|\Exception
    {
        $profile = $this->get($profile_id);

        try {

            $profile->update($profileDto->toArray());
            return  $profile;

        }catch (\Throwable $e){

            throw new \Exception('Internal error please verify with our support for more information.', 500);
        }

    }
    public function delete(int $profile_id): bool|\Exception
    {
        $profile = $this->get($profile_id);

        try {
            return  $profile->delete();

        }catch (\Throwable $e){

            throw new \Exception('Internal error please verify with our support for more information.', 500);
        }
    }
    public function toggle(int $profile_id, int $user_id):array|\Exception
    {
        $profile = $this->get($profile_id);
        $user = $this->userService->get($user_id);

        try {

            return $profile->users()->toggle($user);

        }catch (\Throwable $e){
            throw new \Exception('Internal error in method toggle:',500);
        }

    }
}
