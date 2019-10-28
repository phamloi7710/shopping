<?php

namespace LoiPham\WooCommerce\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'unique:users,username',
            'email' => 'unique:users,email'
        ];
    }
    public function messages()
    {
        return [
            'username.unique' => 'Tên đăng nhập đã tồn tại!',
            'email.unique' => 'Địa chỉ email đã tồn tại!'
        ];
    }
}
