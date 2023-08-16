<?php

namespace App\Services;

use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductService
{

    protected $productRepository;
    protected $fileService;


    public function __construct(ProductRepository $productRepository, FileService $fileService)
    {
        $this->productRepository = $productRepository;
        $this->fileService = $fileService;
    }

    public function getProducts($params)
    {
        return $this->productRepository->getFilteredPaginated($params);
    }

    public function createProduct(Request $request)
    {
        $uploadedFile = $this->fileService->uploadFile($request->file('image'));
        $data = [...$request->validated(), 'image' => $uploadedFile];
        return $this->productRepository->create($data);
    }

}
