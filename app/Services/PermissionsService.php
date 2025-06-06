<?php

namespace App\Services;

use App\DTOs\PermissionsDto;
use App\Models\Permission;
use Illuminate\Database\Eloquent\Collection;
use Mockery\Exception;

class PermissionsService
{
    public function __construct(
        protected ProfileService $profileService
    )
    {}
   public function all(): Collection
   {
       return Permission::all();
   }
   public function store(PermissionsDto $permissionsDto): Permission|\Exception
   {
       try {

           return Permission::create($permissionsDto->toArray());

       }catch (\Throwable $e){

           throw new Exception('Internal error in create an new permission, please verify with our support for more details', 500);
       }
   }
   public function get(int $permission_id): Permission|\Exception
   {
       try {

           return Permission::findOrFail($permission_id);

       }catch (\Throwable $e){

           throw new Exception('Internal error in retrieving an permission, please verify with our support for more details', 500);
       }
   }
   public function update(int $permission_id, PermissionsDto $permissionsDto): Permission|\Exception
   {
       $permission = $this->get($permission_id);

       try {

          $permission->update($permissionsDto->toArray());
          return $permission;

       }catch (\Throwable $e){

           throw new Exception('Internal error in update an permission, please verify with our support for more details', 500);
       }
   }
   public function delete(int $permission_id):bool|\Exception
   {
       $permission = $this->get($permission_id);

       try {

           return $permission->delete();

       }catch (\Throwable $e){

           throw new Exception('Internal error in delete an permission, please verify with our support for more details', 500);
       }
   }
    public function toggle(int $permission_id, int $profile_id):array|\Exception
    {
        $permission = $this->get($permission_id);
        $profile = $this->profileService->get($profile_id);

        try {

            return $permission->profiles()->toggle($profile);

        }catch (\Throwable $e){

            throw new \Exception('Internal error in method toggle:',500);
        }

    }
}
