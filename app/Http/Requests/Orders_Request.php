<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Orders_Request extends FormRequest
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
            'link' => 'required|url',
            'server' => 'required|numeric',
            'quantity' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'link.required' => 'Vui lòng nhập link !',
            'link.url' => 'Vui lòng nhập link hợp lệ !',
            'server.required' => 'Vui lòng nhập Server !',
            'server.numeric' => 'Vui lòng nhập Server hợp lệ !',
            'quantity.required' => 'Vui lòng nhập số lượng cần tăng !',
            'quantity.numeric' => 'Vui lòng nhập số lượng hợp lệ !',
        ];
    }
}
