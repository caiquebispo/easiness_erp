<?php

namespace App\DTOs;

class ProductDto
{
    public function __construct(
        protected int $category_id,
        protected int $company_id,
        protected string $name,
        protected string $description,
        protected ?int $sku = 0,
        protected float $price,
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
