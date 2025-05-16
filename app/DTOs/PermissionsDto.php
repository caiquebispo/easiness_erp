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

    public function withArray(): array
    {
        return [
            'name' => $this->name,
            'label' => $this->label,
            'url' => $this->url,
            'menu_name' => $this->menu_name,
            'icon_class' => $this->icon_class,
            'order_list' => $this->order_list,
            'has_modules' => $this->has_modules,
            'status' => $this->status
        ];
    }
}
