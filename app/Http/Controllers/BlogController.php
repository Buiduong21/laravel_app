<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    
     public function index (Request $req) {
        
        $blog = Blog::orderBy('name','ASC')->get();
       return view('admin.blog.index', compact('blog'));
    }
    public function showblog () {
        
       
       return view('use.showblog');
    }
     public function create () {
        
        return view('admin.blog.create');
    }
    public function store (Request $req){
       
         $req->validate([
            'name' => 'required|unique:blogs',
            'upload'=> 'required|mimes:jpeg,jpg,png,gif,bmp'  
         ],[
            'name.required'=> 'Tên sản phẩm không được để trống',
            'name.unique'=> 'Tên sản phẩm đã được sử dụng',
            'upload.required'=> 'File không được để trống',
            'upload.mimes' => 'Định dạng file là : jpeg, jpg, gif,bmp'
         ]);

         $ext = $req->upload->extension();
         $file_name = time(). '.' . $ext;
         $req->upload->move(public_path('uploads'),$file_name);
         $data = $req->only('name','created_at','description');
         $data['image'] = $file_name;
        ;
         if( Blog::create($data)){
        return redirect() -> route('blog.index')->with('oke','Thêm mới thành công');
        }
        return redirect() -> route('blog.index')->with('no','Thêm mới không thành công');
   }
 public function edit(Blog $blog)
   {   
       
        return view('admin.blog.edit',compact('blog'));
   }
   public function update (Request $req, Blog $blog) {
         $req->validate([
            'name' => 'required|unique:blogs,name,'.$blog->id,
            'upload'=> 'required|mimes:jpeg,jpg,png,gif,bmp'  
         ],[
            'name.required'=> 'Tên sản phẩm không được để trống',
            'name.unique'=> 'Tên sản phẩm đã được sử dụng',
           'upload.required'=> 'File không được để trống',
            'upload.mimes' => 'Định dạng file là : jpeg, jpg, gif,bmp'
         ]);
           $ext = $req->upload->extension();
         $file_name = time(). '.' . $ext;
         $req->upload->move(public_path('uploads'),$file_name);

         $data = $req->only('name','description');
         $blog['image'] = $file_name;
        
         if($blog -> update($req -> only('name','description','image'))){
        return redirect() -> route('blog.index')->with('oke','Sửa thành công');
        }
        return redirect() -> route('blog.index')->with('no','Sửa không thành công');
   }
   public function delete(Blog $blog)
   {
      
       if($blog -> delete()){
        return redirect() -> route('blog.index')->with('oke','Xóa thành công');
        }
        return redirect() -> route('blog.index')->with('no','Xóa không thành công');
      
   }
}