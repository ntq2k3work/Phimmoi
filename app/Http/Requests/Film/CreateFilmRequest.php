<?php

namespace App\Http\Requests\Film;

use Illuminate\Foundation\Http\FormRequest;

class CreateFilmRequest extends FormRequest
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
        return [
            'name' => 'required|string',
            'description' => 'required|string',
            'director' => 'required|string',
            'performer' => 'required|string',
            'trailer' => 'required|url',
            'category_id' => 'required|exists:categories,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên phim không được để trống.',
            'name.string' => 'Tên phim phải là chuỗi.',
            'description.required' => 'Mô tả phim không được để trống.',
            'description.string' => 'Mô tả phim phải là chuỗi.',
            'director.required' => 'Đạo diễn phim không được để trống.',
            'director.string' => 'Đạo diễn phim phải là chuỗi.',
            'performer.required' => 'Diễn viên phim không được để trống.',
            'performer.string' => 'Diễn viên phim phải là chuỗi.',
        ];
    }
}
