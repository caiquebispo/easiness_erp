<?php

namespace App\DTOs;

class CategoryDto
{
    public function __construct(
        protected int $company_id,
        protected string $name,
        protected ?string $description = null,
    ) {}

    public static function make(...$params): self
    {
        return new self(...$params);
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
