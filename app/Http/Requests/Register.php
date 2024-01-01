<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Register extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'username' => 'required|min:6|max:255|unique:user',
            'email' => 'required|email|unique:user',
            'password' => 'required|min:6'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên tài khoản !',
            'name.max' => 'Tên tài khoản quá dài !',
            'username.required' => 'Vui lòng nhập tên đăng nhập !',
            'username.min' => 'Tên đăng nhập quá ngắn !',
            'username.unique' => 'Tên đăng nhập đã tồn tại !',
            'email.required' => 'Vui lòng nhập địa chỉ email !',
            'email.email' => 'Địa chỉ email không hợp lệ !',
            'email.unique' => 'Địa chỉ email đã tồn tại !',
            'password.required' => 'Vui lòng nhập mật khẩu !',
            'password.min' => 'Mật khẩu không an toàn !',
        ];
    }
}
