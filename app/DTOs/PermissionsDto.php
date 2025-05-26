<?php

namespace App\DTOs;

class PermissionsDto
{
    public function __construct(
        protected string $name,
        protected ?string $label = '',
        protected ?string $url = '/',
        protected ?string $menu_name = '',
        protected ?string $icon_class = '',
        protected ?int $order_list = 0,
        protected ?bool $has_modules = true,
        protected ?bool $status = true
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
