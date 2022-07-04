<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequestUpdate extends FormRequest
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
        // dd(request()->route('category')->id);
        return [
             'name' => 'required|max:100|min:3|unique:categories,name,'.request()->route('category')-> id
        ];
    }
    public function messages()
    {
        return [
               'name.required' => 'Tên danh mục không được để trống',
            'name.unique' => 'Tên danh mục đã sử dụng',
            'name.max' => 'Tên danh mục tối đa 100 ký tự',
            'name.min' => 'Tên danh mục tối tối thiểu 3 ký tự'
        ];
    }
}