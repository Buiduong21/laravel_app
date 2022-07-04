<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequestStore extends FormRequest
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
             'name' => 'required|unique:categories|max:100|min:3'
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
    // public function delete(Type $var = null)
    // {
    //   if($category -> forceDelete()){
    //     return redirect() -> route('category.index')->with('oke','Xóa vĩnh viễn thành công');
    //     }
    //     return redirect() -> route('category.index')->with('no','Xóa vĩnh viễn không thành công');
    // }
}