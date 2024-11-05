<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CreateCategoryRequest;
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

    public function create()
    {
        return view('pages.categories.create');
    }

    public function store(CreateCategoryRequest $request)
    {
        $data = $request->validated();
        $this->__categoryService->createCategory($data);
        alert()->success('Thành công','Thêm mới thành công');
        return redirect()->route('admin.categories');
    }
}
