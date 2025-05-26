<?php

namespace App\DTOs;

use Illuminate\Contracts\Support\Arrayable;

class CompanyDto implements  Arrayable
{
    public function __construct(
        public string $social_reason,
        public ?string $state_registration = null,
        public ?string $email = null,
        public ?string $cnpj = null,
        public ?int $phone_number = null,
        public ?string $foundation_date = null,
        public ?bool $status = true,
    )
    {}
    public static function make(...$params): self
    {
        return new self(...$params);
    }
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
