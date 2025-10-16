<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Chỉ admin mới được cập nhật sản phẩm
        return auth()->check() && auth()->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     * 
     * Áp dụng validation để bảo mật và đảm bảo dữ liệu hợp lệ
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'category_id' => ['required', 'exists:categories,id'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Tên sản phẩm là bắt buộc',
            'price.required' => 'Giá sản phẩm là bắt buộc',
            'price.numeric' => 'Giá phải là số',
            'price.min' => 'Giá không được âm',
            'stock.required' => 'Số lượng tồn kho là bắt buộc',
            'stock.integer' => 'Số lượng phải là số nguyên',
            'stock.min' => 'Số lượng không được âm',
            'category_id.required' => 'Vui lòng chọn danh mục',
            'category_id.exists' => 'Danh mục không tồn tại',
            'image.image' => 'File phải là ảnh',
            'image.mimes' => 'Ảnh phải có định dạng: jpeg, png, jpg, gif',
            'image.max' => 'Kích thước ảnh không được vượt quá 2MB',
        ];
    }
}
