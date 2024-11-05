<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => 'string',
            'email' => 'email|unique:users,email',
            'phone_number' => 'string|max:15|unique:users,phone_number',
            'birthday' => 'date|before:now',
            'address' => 'nullable|string|max:255',
            'avatar_url' => 'nullable|image|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'email.string' => 'Email phải là chuỗi.',
            'email.email' => 'Email không đúng định dạng.',
            'email.max:255' => 'Email không quá 255 ký tự.',
            'email.unique' => 'Email đã tồn tại.',
            'phone_number.required' => 'S điện thoại không được để trống',
            'phone_number.unique' => 'Số điện thoại phải duy nhất',
            'birthday.before' => 'Ngày sinh phải trước ngày hiện tại'
        ];
    }
}
