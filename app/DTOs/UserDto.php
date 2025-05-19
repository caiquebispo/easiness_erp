<?php

namespace App\DTOs;

use Illuminate\Support\Facades\Hash;

final class UserDto
{
    public function __construct(
        protected string $name,
        protected string $email,
        protected string $password,
        protected ?string $company_id = null,
    )
    {}
    public function withPassword(): UserDto
    {
       $this->password = Hash::make($this->password);
        return  $this;
    }
    public function withArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'company_id' => $this->company_id,
        ];
    }
}
