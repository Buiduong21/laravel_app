<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
      public function index(){
      $data = Product::paginate(5);
      // dd($data[0]->cat);
       return view('admin.product.index', compact('data'));     
   }
       public function chitiet(Product $product){
         //  dd($product);
          return view('admin.product.chitiet', compact('product'));    
   }
   
   public function create(){
      $cat = Category::orderBy('name','ASC')->get();
       return view('admin.product.create', compact('cat'));
       
   }
   public function edit(Product $product)
   {   
         $cat = Category::orderBy('name','ASC')->get();
        return view('admin.product.edit', compact('product','cat'));
   }
  
   public function update (Request $req, Product $product) {
         $req->validate([
            'name' => 'required|unique:products,name,'.$product->id,
            'category_id' => 'required',
            'status' => 'required'
            // 'upload'=> 'required|mimes:jpeg,jpg,png,gif,bmp'  
         ],[
            'name.required'=> 'Tên sản phẩm không được để trống',
            'name.unique'=> 'Tên sản phẩm đã được sử dụng',
            'category_id.required'=> 'Tên sản phẩm không được để trống',
            'status.required'=> 'Trạng thái không được để trống'
            // 'upload.required'=> 'File không được để trống',
            // 'upload.mimes' => 'Định dạng file là : jpeg, jpg, gif,bmp'
         ]);
         //  $ext = $req->upload->extension();
         // $file_name = time(). '.' . $ext;
         // $req->upload->move(public_path('uploads'),$file_name);

         // $data = $req->only('name','price','sale_price','category_id','description');
         // $product['image'] = $file_name;

         if($product -> update($req -> only('name','price','sale_price','category_id','description','status','image'))){
        return redirect() -> route('product.index')->with('oke','Sửa thành công');
        }
        return redirect() -> route('product.index')->with('no','Sửa không thành công');
   }
   
   
     public function store (Request $req){
         $req->validate([
            'name' => 'required|unique:products',
            'category_id' => 'required',
            'price' => 'required',
            'status' => 'required',
            'upload'=> 'required|mimes:jpeg,jpg,png,gif,bmp'  
         ],[
            'name.required'=> 'Tên sản phẩm không được để trống',
            'name.unique'=> 'Tên sản phẩm đã được sử dụng',
            'category_id.required'=> 'Tên sản phẩm không được để trống',
            'price.required'=> 'Giá sản phẩm không được để trống',
            'status.required'=> 'Trạng thái không được để trống',
            'upload.required'=> 'File không được để trống',
            'upload.mimes' => 'Định dạng file là : jpeg, jpg, gif,bmp'
         ]);

         $ext = $req->upload->extension();
         $file_name = time(). '.' . $ext;
         $req->upload->move(public_path('uploads'),$file_name);
         // dd($file_name);

         $data = $req->only('name','price','sale_price','category_id','description');
         $data['image'] = $file_name;
         // dd($data);
        ;

         if( Product::create($data)){
        return redirect() -> route('product.index')->with('oke','Thêm mới thành công');
        }
        return redirect() -> route('product.index')->with('no','Thêm mới không thành công');
   }

   public function delete(Product $product)
   {
      
       if($product -> delete()){
        return redirect() -> route('product.index')->with('oke','Xóa thành công');
        }
        return redirect() -> route('product.index')->with('no','Xóa không thành công');
      
   }
}