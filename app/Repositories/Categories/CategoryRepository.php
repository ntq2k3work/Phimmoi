<?php

namespace App\Repositories\Categories;

use App\Models\Category;
use App\Repositories\BaseRepository;

class CategoryRepository extends BaseRepository {

    protected $__category;

    public function __construct(Category $category) {
        parent::__construct($category);
    }
}
