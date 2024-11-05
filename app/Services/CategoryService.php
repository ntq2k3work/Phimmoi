<?php

namespace App\Services;

use App\Repositories\Categories\CategoryRepository;

class CategoryService {

    protected $__categoryRepository;

    public function __construct(CategoryRepository $categoryRepository) {
        $this->__categoryRepository = $categoryRepository;
    }

    public function getAllCategories()
    {
        return $this->__categoryRepository->getAll();
    }
}
