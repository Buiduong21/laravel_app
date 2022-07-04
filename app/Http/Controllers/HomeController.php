<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Favotite;
use App\Models\Blog;


use Auth;




class HomeController extends Controller
{
    public function home(){
        $cats = Category::all();
        return view('home', compact('cats'));
    }
     public function use_showCat(){
        $cats = Category::all();
        return view('master.use', compact('cats'));
    }
     public function about(){
        return view('about');
    }
    public function homeUse()
    {
       $proCarousel = Product::orderBy('id','DESC')->where('sale_price','=',NUll)->limit(7)->get();
       $proSale = Product::orderBy('name','DESC')->where('sale_price','>',0)->limit(8)->get();
       $proNew = Product::orderBy('id','DESC')->where('sale_price','>',0)->limit(8)->get();
                  $carts = session('cart') ? session('cart') : [];
       $blogs = Blog::orderBy('id','DESC')->limit(3)->get();

            return view('use.homeUse', compact('proCarousel','proSale','proNew','carts','blogs'));
    }
    // public function Cat_show_product(Category $category)
    // {
    //     $catProduct = $category->products()->paginate(3);
        
    //    return view('use.homeUse', compact('catProduct'));
    // }
    public function danhmuc(Category $category)
    {
    $products = $category->products()->paginate(4);
    // dd($products);
    return view('use.danhmuc', compact('products','category'));
    }
    public function chiTietsp(Product $product)
    {
        // dd($product);
        return view('use.chiTietsp', compact('product'));
    }
    public function dangKy()
    {
    return view('use.dangKy');
    }
     public function post_dangKy(Request $req)
    {

    
     $req->validate(
         [
            'password' => 'required',
            'confirm_password' => 'required|same:password'
         ],
         [
            'password.require' => 'Mật khẩu không được để trống',
            'confirm_password.same' => 'Xác nhận mật khẩu chưa giống nhau'
         ]);
         $data = $req->only('name', 'email','password','phone','address');
         $data['password'] = bcrypt($req->password);
         if(Customer::create($data)){
             return redirect()->route('use.dangNhap');
         }
         else{
             return redirect()->back();
         };

    }

    public function dangNhap()
    {
       return view('use.dangNhap');
    }
     public function post_dangNhap(Request $req)
    {
    //  dd($req->all());
     $data = $req->only('email','password');
        $check = auth()->guard('customer')->attempt($data);
        // dd($check);
        if ($check){
        return redirect()->route('use.homeUse');
        }
        return redirect()->back();
    }

    public function thoat()
    {
       auth()->guard('customer')->logout();
       return view('use.dangNhap');
    }

    public function yeuThich($id)
    {
      //  $yeuthich = Customers('soyeuthich')->find(1);
         Favotite::create([
            'product_id' => $id,
            'customer_id' => auth()->guard('customer')->user()->id
         ]);
               return redirect()->route('use.homeUse');
               // return view('use.homeUse', compact('yeuthich'));

    }

    public function danhSachYeuThich()
    {
         $carts = session('cart') ? session('cart') : [];
   //   dd(auth()->guard('customer')->user()->yeuThich);
   $products = auth()->guard('customer')->user()->yeuThich;
    return view('use.danhSachYeuThich', compact('products','carts'));
    }
   public function xoaYeuThich($id)
    {
         Favotite::where([
            'product_id' => $id,
            'customer_id' => auth()->guard('customer')->user()->id
         ])->delete();
               return redirect()->route('use.homeUse');

    }

  
   
}