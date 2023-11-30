<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name' => 'required|max:100|unique:products,id,'.$this->request->get('id'),
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Vui lòng không rỗng',
            'name.unique' => "$this->name đã tồn tại",
            'name.max' => 'Không được nhiều hơn 100 ký tự',
        ];
    }
}
