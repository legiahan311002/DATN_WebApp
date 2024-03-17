<?php

namespace App\Http\Requests\Seller\CategoryChild;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryChildRequest extends FormRequest
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
            'name_category_child' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'name_category_child.required' => 'Tên danh mục không được để trống!',
        ];
    }
}
