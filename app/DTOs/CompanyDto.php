<?php

namespace App\DTOs;

class CompanyDto
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected string $social_reason,
        protected ?string $state_registration = null,
        protected ?string $email = null,
        protected ?string $cnpj = null,
        protected ?int $phone_number = null,
        protected ?string $foundation_date = null,
        protected ?bool $status = true,
    )
    {}
    public function withArray(): array
    {
        return [
            'social_reason' => $this->social_reason,
            'state_registration' => $this->state_registration,
            'email' => $this->email,
            'cnpj' => $this->cnpj,
            'phone_number' => $this->phone_number,
            'foundation_date' => $this->foundation_date,
            'status' => $this->status,
        ];
    }
}
