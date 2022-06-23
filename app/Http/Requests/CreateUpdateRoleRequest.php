<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUpdateRoleRequest extends FormRequest
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
            'name' => 'required|string',
            'description' => 'string',
        ];
    }

    public function message()
    {
        return [
            'name.required' => "Tên Role là bắt buộc.",
            'name.string' => "Tên Role là kiểu chuổi.",
            'desctiption.string' => "Nội dung mô tả là kiểu chuổi."
        ];
    }
}
