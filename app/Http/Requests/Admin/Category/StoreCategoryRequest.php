<?php

namespace App\Http\Requests\Admin\Category;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'name' => 'required|unique:categories|max:100',
            'photo' => 'required|image'
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Vui lòng không rỗng',
            'name.unique' => "$this->name đã tồn tại",
            'name.max' => 'Không được nhiều hơn 100 ký tự',
            'photo.required' => 'Vui lòng chọn ảnh'
        ];
    }
}
