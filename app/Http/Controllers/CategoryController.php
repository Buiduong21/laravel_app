<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\Category\CategoryRequestStore as reqStore;
use App\Http\Requests\Category\CategoryRequestUpdate as reqUpdate;



class CategoryController extends Controller
{
    
    public function create () {
        return view('admin.category.create');
    }

     public function index (Request $req) {
         $data = Category::search()->paginate(5);
        //  dd($data);
        return view('admin.category.index', compact('data'));
    }

    public function store (reqStore $req) {
        if(Category::add()){
        return redirect() -> route('category.index')->with('oke','Thêm mới thành công');
        }
        return redirect() -> route('category.index')->with('no','Thêm mới không thành công'); 
    }
    public function delete (Category $category) {
        // dd($category);
        if($category -> delete()){
        return redirect() -> route('category.index')->with('oke','Xóa thành công');
        }
        return redirect() -> route('category.index')->with('no','Xóa không thành công'); 
    }
    public function edit (Category $category) {
        // dd($category);
        return view('admin.category.edit', compact('category'));
        
     }

    public function update (reqUpdate $req, Category $category) {
         if($category -> UpdateCat()){
        return redirect() -> route('category.index')->with('oke','Sửa thành công');
        }
        return redirect() -> route('category.index')->with('no','Sửa không thành công');
    }

    //Thông tin danh mục trong thùng rác
       public function transh() {
         $data = Category::search()->onlyTrashed()->paginate(5);
        //  dd($data);
        return view('admin.category.transh', compact('data'));
    }

    //phục hồi phương thức đã xóa
     public function restore($id) {
         $category = Category::withTrashed()->find($id);
        //  dd($category);
        if($category -> restore()){
        return redirect() -> route('category.index')->with('oke','Khôi phục thành công');
        }
        return redirect() -> route('category.index')->with('no','KHôi phục thành công');
    }
    public function forceDelete($id)
    {
       $category = Category::withTrashed()->find($id);
        //  dd($category);
        if($category->products->count() > 0 ){
             return redirect() -> route('category.index')->with('no','Danh mục này đang có sản phẩm tham chiếu');
        }
        
        if($category -> forceDelete()){
            return redirect() -> route('category.index')->with('oke','Xóa vĩnh viễn thành công');
        }
        
        return redirect() -> route('category.index')->with('no','Xóa vĩnh viễn không thành công');
    }
}