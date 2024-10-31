<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'phone_number' => 'required|string|max:15|unique:users,phone_number',
            'birthday' => 'required|date',
            'address' => 'nullable|string|max:255',
            'gender' => 'required',
            'avatar_url' => 'nullable|file|image|max:2048',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Tên người dùng không được để trống.',
            'name.string' => 'Tên người dùng phải là chuỗi.',
            'name.max:255' => 'Tên người dùng không quá 255 ký tự.',
            'email.required' => 'Email không được để trống.',
            'email.string' => 'Email phải là chuỗi.',
            'email.email' => 'Email không đúng định dạng.',
            'email.max:255' => 'Email không quá 255 ký tự.',
            'email.unique' => 'Email đã tồn tại.',
            'password.required' => 'Mật khẩu không được để trống.',
            'password.min' => 'Mật khẩu phải lớn hơn 8 ký tự',
            'phone_number.required' => 'Số điện thoại không được để trống',
            'phone_number.unique' => 'Số điện thoại phải duy nhất'
        ];
    }
}
