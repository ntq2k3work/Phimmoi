<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CreateCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
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
        $status = $this->__categoryService->createCategory($data);
        if($status){
            alert()->success('Thành công','Thêm thành công');
        }else{
            alert()->error('Thất bại','Thêm thất bại');
        }
        return redirect()->route('admin.categories');
    }

    public function edit($id)
    {
        $category = $this->__categoryService->getCategoryById($id);
        return view('pages.categories.edit',compact('category'));
    }

    public function update(UpdateCategoryRequest $request, $id )
    {
        $data = $request->validated();
        $status = $this->__categoryService->updateCategory($id, $data);
        if($status){
            alert()->success('Thành công','Sửa thành công');
        }else{
            alert()->error('Thất bại','Sửa thất bại');
        }
        return redirect()->route('admin.categories');
    }

    public function destroy($id)
    {
        $status = $this->__categoryService->deleteCategory($id);
        if($status){
            alert()->success('Thành công','Xóa thành công');
        }else{
            alert()->error('Thất bại','Xóa thất bại');
        }
        return redirect()->route('admin.categories');
    }
}
