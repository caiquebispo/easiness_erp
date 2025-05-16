<?php

namespace App\DTOs;

class ProfileDto
{

    public function __construct(
        public string $name,
        public ?string $label = '',
        public ?bool $status = true
    )
    {}
    public function withArray(): array
    {
        return [
            'name' => $this->name,
            'label' => $this->label,
            'status' => $this->status
        ];
    }
}
