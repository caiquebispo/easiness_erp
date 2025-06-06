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
    public static function make(...$params): UserDto
    {
        return new self(...$params);
    }
    public function withPassword(): UserDto
    {
       $this->password = Hash::make($this->password);
        return  $this;
    }
    public function toArray(): array
    {
        $this->withPassword();

        return get_object_vars($this);
    }
}
