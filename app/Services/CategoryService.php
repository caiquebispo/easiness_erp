<?php

namespace App\Services;

use App\DTOs\CategoryDto;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryService
{
    public function store(CategoryDto $categoryDto): Category|\Exception
    {
        try {
            return Category::create($categoryDto->toArray());
        } catch (\Throwable $e) {
            throw new \Exception('Failed to create category: ', 500);
        }
    }
    public function all(): Collection|\Exception
    {
        try {
            return Category::all();
        } catch (\Throwable $e) {
            throw new \Exception('Failed to retrieve categories: ', 500);
        }
    }
    public function get(int $id): Category|\Exception
    {
        try {
            return Category::findOrFail($id);
        } catch (\Throwable $e) {
            throw new \Exception('Category not found: ', 404);
        }
    }
    public function update(int $id, CategoryDto $categoryDto): Category|\Exception
    {
        $category = $this->get($id);

        try {
            $category->update($categoryDto->toArray());
            return $category;
        } catch (\Throwable $e) {
            throw new \Exception('Failed to update category: ', 500);
        }
    }
    public function delete(int $id): bool|\Exception
    {
        $category = $this->get($id);

        try {
            return $category->delete();
        } catch (\Throwable $e) {
            throw new \Exception('Failed to delete category: ', 500);
        }
    }
}
