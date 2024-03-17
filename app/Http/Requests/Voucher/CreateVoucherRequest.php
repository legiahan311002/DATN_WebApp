<?php

namespace App\Http\Requests\Voucher;

use Illuminate\Foundation\Http\FormRequest;

class CreateVoucherRequest extends FormRequest
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
            'code' => 'required|unique:voucher',
            'usageLimit' => 'required|numeric|min:1',
            'discountPercentage' => 'nullable|numeric|min:1|max:100|exclusive_discount:discountAmount',
            'discountAmount' => 'nullable|numeric|min:1|exclusive_discount:discountPercentage',

            'validFrom' => 'required|date',
            'validTo' => 'required|date|after:validFrom',
        ];
    }

    public function messages(): array
    {
        return [
            'code.required' => 'Mã code không được để trống!',
            'code.unique' => 'Mã code đã tồn tại!',
            'usageLimit.required' => 'Số lượng không được để trống!',
            'usageLimit.numeric' => 'Số lượng phải là một số.',
            'usageLimit.min' => 'Số lượng không thể nhỏ hơn 1.',
            'discountPercentage.numeric' => 'Phần trăm giảm giá phải là một số.',
            'discountPercentage.min' => 'Phần trăm giảm giá không thể nhỏ hơn 1%.',
            'discountPercentage.max' => 'Phần trăm giảm giá không thể lớn hơn 100%.',
            'discountPercentage.exclusive_discount' => 'Phần trăm giảm giá và số tiền giảm giá không thể được chọn cùng một lúc.',
            'discountAmount.numeric' => 'Số tiền giảm giá phải là một số.',
            'discountAmount.min' => 'Số tiền giảm giá không thể nhỏ hơn 1.',
            'discountAmount.exclusive_discount' => 'Số tiền giảm giá và phần trăm giảm giá không thể được chọn cùng một lúc.',
            'validFrom.required' => 'Ngày bắt đầu không được để trống.',
            'validFrom.date' => 'Ngày bắt đầu phải là một ngày hợp lệ.',
            'validTo.required' => 'Ngày kết thúc không được để trống.',
            'validTo.date' => 'Ngày kết thúc phải là một ngày hợp lệ.',
            'validTo.after' => 'Ngày kết thúc phải sau ngày bắt đầu.',
        ];
    }
}
