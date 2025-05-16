<?php

namespace App\Services;

use App\DTOs\ProfileDto;
use App\Models\Profile;

class ProfileService
{
    public function all()
    {
        return Profile::all();
    }
    public function show(int $profile_id): Profile|\Exception
    {
        try {
            return  Profile::findOrFail($profile_id);

        }catch (\Exception $e){
            throw new \Exception('Internal error please verify with our support for more information.', 500);
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
}
