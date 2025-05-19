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
    public function show(int $profile_id): Profile|\Exception
    {
        try {
            return  Profile::findOrFail($profile_id);

        }catch (\Exception $e){
            throw new \Exception('Profile Notfound', 404);
        }
    }

    public function store(ProfileDto $profileDto): Profile|\Exception
    {
        try {

            return  Profile::create($profileDto->withArray());

        }catch (\Exception $e){

            throw new \Exception('Internal error please verify with our support for more information.'.$e->getMessage(), 500);
        }
    }
    public function update(int $profile_id, ProfileDto $profileDto):Profile|\Exception
    {
        $profile = $this->show($profile_id);

        try {

            $profile->update($profileDto->withArray());
            return  $profile;

        }catch (\Exception $e){

            throw new \Exception('Internal error please verify with our support for more information.', 500);
        }

    }
    public function delete(int $profile_id): bool|\Exception
    {
        $profile = $this->show($profile_id);

        try {
            return  $profile->delete();

        }catch (\Exception $e){

            throw new \Exception('Internal error please verify with our support for more information.', 500);
        }
    }
    public function toggle(int $profile_id, int $user_id):array|\Exception
    {
        $profile = $this->show($profile_id);
        $user = $this->userService->show($user_id);

        try {

            return $profile->users()->toggle($user->id);

        }catch (\Exception $e){
            throw new \Exception('Internal error in method toggle:',500);
        }

    }
}
