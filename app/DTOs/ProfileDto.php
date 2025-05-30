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
    public static function make(...$params): self
    {
        return new self(...$params);
    }
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
