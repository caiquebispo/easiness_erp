<?php

namespace App\Services;

use App\DTOs\ProductDto;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductService
{
   public function store(ProductDto $productDto): Product|\Exception
   {
       try {
           return Product::create($productDto->toArray());
       }catch (\Throwable $e) {
           throw new \Exception('Failed to create product: ', 500);
       }
   }
    public function all(): Collection|\Exception
    {
        try {
         return Product::all();
        }catch (\Throwable $e) {
            throw new \Exception('Failed to retrieve products: ', 500);
        }
    }
    public function get(int $id): Product|\Exception
    {
        try {

            return Product::findOrFail($id);

        } catch (\Throwable $e) {
            throw new \Exception('Product not found: ', 404);
        }
    }
    public function update(int $id, ProductDto $productDto): Product|\Exception
    {
        $product = $this->get($id);

        try {
            $product->update($productDto->toArray());
            return $product;
        } catch (\Throwable $e) {
            throw new \Exception('Failed to update product: ', 500);
        }
    }
    public function delete(int $id): bool|\Exception
    {
        $product = $this->get($id);

        try {
            return $product->delete();
        } catch (\Throwable $e) {
            throw new \Exception('Failed to delete product: ', 500);
        }
    }


}
