<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{

    public function getFilteredPaginated($params)
    {
        $productQuery = Product::query();
        if (!empty($params['sortBy'])) {
            switch ($params['sortBy']) {
                case 'nameAsc':
                    $productQuery = $productQuery->orderBy('name', 'asc');
                    break;
                case 'nameDesc':
                    $productQuery = $productQuery->orderBy('name', 'desc');
                    break;
                case 'priceAsc':
                    $productQuery = $productQuery->orderBy('price', 'asc');
                    break;
                case 'priceDesc':
                    $productQuery = $productQuery->orderBy('price', 'desc');
                    break;
                default:
                    break;
            }
        }

        if (!empty($params['category'])) {
            $productQuery = $productQuery->whereHas('categories', fn ($query) => $query->where('categories.id', $params['category']));
        }

        $products = $productQuery->paginate(10);
        return $products;
    }

    public function create($data)
    {
        $product = Product::create([
            'name' => $data('name'),
            'description' => $data('description'),
            'price' => $data('price'),
        ]);
        return  $product;
    }
}
