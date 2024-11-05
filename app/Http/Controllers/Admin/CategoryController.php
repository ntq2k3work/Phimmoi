<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $__categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->__categoryService = $categoryService;
    }

    public function index()
    {
        $categories = $this->__categoryService->getAllCategories();
        return view('pages.categories.index',compact('categories'));
    }
}
