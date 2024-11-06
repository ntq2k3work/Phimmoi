<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $categoryId = $this->route('id');
        return [
            'name' => 'unique:categories,name,'.$categoryId
        ];
    }

    public function message(): array
    {
        return [
            'name.string' => 'Tên danh mục phải là chuỗi',
            'name.unique' => 'Tên danh mục đã tồn tại',
        ];
    }
}
