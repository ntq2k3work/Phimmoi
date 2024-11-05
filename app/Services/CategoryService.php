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

    public function createCategory(array $data)
    {
        return $this->__categoryRepository->create($data);
    }

    public function updateCategory($id, array $data)
    {
        return $this->__categoryRepository->update($id, $data);
    }

    public function getCategoryById($id)
    {
        return $this->__categoryRepository->findById($id);
    }

}
