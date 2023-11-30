<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => 'required|unique:products|max:100',
            'price' => 'required|numeric|min:1',
            'photo' => 'required|image',
            'photos' => 'required'
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Vui lòng không rỗng',
            'price.required' => 'Vui lòng nhập giá sản phẩm',
            'price.numeric' => 'Phải là số',
            'price.min' => 'Bội số phải lớn hơn 1',
            'name.unique' => "$this->name đã tồn tại",
            'name.max' => 'Không được nhiều hơn 100 ký tự',
            'photo.required' => 'Vui lòng chọn ảnh',
            'photos.required' => 'Vui lòng chọn ảnh'
        ];
    }
}
