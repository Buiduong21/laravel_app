<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BlogController;





Route :: group(['prefix'=>'gioHang'],function(){
   Route :: get('/add/{id}',[CartController :: class,'add'])->name('gioHang.add');
   Route :: get('/update/{id}',[CartController :: class,'update'])->name('gioHang.update');
   Route :: get('/delete/{id}',[CartController :: class,'delete'])->name('gioHang.delete');
   Route :: get('/clear',[CartController :: class,'clear'])->name('gioHang.clear');
   Route :: get('/view',[CartController :: class,'view'])->name('gioHang.view');
   Route :: get('/hoaDon',[CartController :: class,'hoaDon'])->name('gioHang.hoaDon');
   Route :: post('/posthoaDon',[CartController :: class,'posthoaDon'])->name('gioHang.posthoaDon');
   Route :: get('/inHoaDon/{order}',[CartController :: class,'inHoaDon'])->name('gioHang.inHoaDon');


});




//người dùng

// Route::get('use/danhMuc', [HomeController::class, 'danhmuc'])->name('use.danhmuc');
Route::group(['prefix' => 'use'], function(){
Route::get('', [HomeController::class, 'homeUse'])->name('use.homeUse');
Route::get('homeUse', [HomeController::class, 'homeUse'])->name('use.homeUse');
Route::get('/{category}-{slug}', [HomeController::class, 'danhmuc'])->name('use.danhmuc');
// Route::get('sanpham/{category}-{slug}', [HomeController::class, 'sanpham'])->name('use.danhmuc');
Route::get('chiTietsp/{product}', [HomeController::class, 'chiTietsp'])->name('use.chiTietsp');
Route::get('dangKy', [HomeController::class, 'dangKy'])->name('use.dangKy');
Route::post('dangKy', [HomeController::class, 'post_dangKy']);
Route::get('dangNhap', [HomeController::class, 'dangNhap'])->name('use.dangNhap');
Route::post('dangNhap', [HomeController::class, 'post_dangNhap']);
Route::get('thoat', [HomeController::class, 'thoat'])->name('use.thoat');
Route::get('yeuThich/{id}', [HomeController::class, 'yeuThich'])->name('use.yeuThich');
Route::get('xoaYeuThich/{id}', [HomeController::class, 'xoaYeuThich'])->name('use.xoaYeuThich');
Route::get('danhSachYeuThich', [HomeController::class, 'danhSachYeuThich'])->name('use.danhSachYeuThich');

});


    Route::get('',[HomeController::class, 'home'])->name('home');
    Route::get('admin/dangky', [Admincontroller::class, 'dangky'])->name('admin.dangky');
    Route::post('admin/dangky', [Admincontroller::class, 'hungdangky']);


     Route::get('admin/login', [Admincontroller::class, 'login'])->name('admin.login');
     Route::post('admin/login', [AdminController::class, 'check_login']);
     Route::get('admin/logout', [AdminController::class, 'logout'])->name ('admin.logout');

    Route::get('gioi-thieu',[HomeController::class, 'about']);
// , 'middleware' => 'auth'
    Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    // Route::resources([
    //     'category' => CategoryController::class,
    //     // 'product'>ProductController::class
    // ]);
    Route::get('', [AdminController::class, 'dashbard']) -> name ('admin.dashboard');
    Route::get('create', [AdminController::class, 'dashboard']) -> name ('admin.dashboard');
            // danh muc admin
    Route::group(['prefix' => 'category'], function(){
    Route::get('', [CategoryController::class, 'index']) -> name ('category.index');
    Route::get('transh', [CategoryController::class, 'transh']) -> name ('category.transh');
    Route::get('create', [CategoryController::class, 'create']) -> name ('category.create');
    Route::post('store', [CategoryController::class, 'store']) -> name ('category.store');
    Route::delete('delete/{category}', [CategoryController::class, 'delete']) -> name ('category.delete');
    Route::get('edit/{category}', [CategoryController::class, 'edit']) -> name ('category.edit');
    Route::get('restore/{category}', [CategoryController::class, 'restore']) -> name ('category.restore');//phục hồi 
    Route::delete('forceDelete/{category}', [CategoryController::class, 'forceDelete']) -> name ('category.forceDelete'); //xóa vĩnh viễn
    Route::put('update/{category}', [CategoryController::class, 'update']) -> name ('category.update');
    });
    // sản phẩm admin
    Route::group(['prefix' => 'product'], function(){
    Route::get('', [ProductController::class, 'index']) -> name ('product.index');
    Route::get('create', [ProductController::class, 'create']) -> name ('product.create');
    Route::post('store', [ProductController::class, 'store']) -> name ('product.store');
    Route::get('chitiet/{product}', [ProductController::class, 'chitiet']) -> name ('product.chitiet');
    Route::delete('delete/{product}', [ProductController::class, 'delete']) -> name ('product.delete');
    Route::get('edit/{product}', [ProductController::class, 'edit']) -> name ('product.edit');
    Route::put('update/{product}', [ProductController::class, 'update']) -> name ('product.update');
    });
    // blog admin
    Route::group(['prefix' => 'blog'], function(){
    Route::get('', [BlogController::class, 'index']) -> name ('blog.index');
    Route::get('showblog', [BlogController::class, 'showblog']) -> name ('blog.show');
    Route::get('create', [BlogController::class, 'create']) -> name ('blog.create');
    Route::post('store', [BlogController::class, 'store']) -> name ('blog.store');
    // Route::get('chitiet/{blog}', [BlogController::class, 'chitiet']) -> name ('blog.chitiet');
    Route::delete('delete/{blog}', [BlogController::class, 'delete']) -> name ('blog.delete');
    Route::get('edit/{blog}', [BlogController::class, 'edit']) -> name ('blog.edit');
    Route::put('update/{blog}', [BlogController::class, 'update']) -> name ('blog.update');
    }); 
    // Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    // Route::get('/', [AdminController::class, 'dashboard'])->name('admin.index');
    // Route::resources([
    // 'Category' => CategoryController::class,
    // 'product'>ProductController::class
    // ]);


    // Route::group(['prefix'=>'category'], function(){
    // Route::get('category/rashed', [CategoryController::class, 'trashed'])->name('category.trashed');
    // Route::get('restore/{category}', [CategoryController::class, 'restore'])->name('category.restore');
    // Route::delete('force-delete/{category}', [CategoryController::class, 'forceDelete'])->name('category.forceDelete');
    // });

    //  Route::get('', [AdminController::class, 'dashbard']) -> name ('admin.dashboard');
    // Route::get('create', [AdminController::class, 'dashboard']) -> name ('admin.dashboard');
    //         // danh muc admin
    // Route::group(['prefix' => 'category'], function(){
    // Route::get('', [CategoryController::class, 'index']) -> name ('category.index');
    // Route::get('transh', [CategoryController::class, 'transh']) -> name ('category.transh');
    // Route::get('create', [CategoryController::class, 'create']) -> name ('category.create');
    // Route::post('store', [CategoryController::class, 'store']) -> name ('category.store');
    // Route::delete('delete/{category}', [CategoryController::class, 'delete']) -> name ('category.delete');
    // Route::get('edit/{category}', [CategoryController::class, 'edit']) -> name ('category.edit');
    // Route::get('restore/{category}', [CategoryController::class, 'restore']) -> name ('category.restore');//phục hồi 
    // Route::delete('forceDelete/{category}', [CategoryController::class, 'forceDelete']) -> name ('category.forceDelete'); //xóa vĩnh viễn
    // Route::put('update/{category}', [CategoryController::class, 'update']) -> name ('category.update');
    // });
    // // sản phẩm admin
    // Route::group(['prefix' => 'product'], function(){
    // Route::get('', [ProductController::class, 'index']) -> name ('product.index');
    // Route::get('create', [ProductController::class, 'create']) -> name ('product.create');
    // Route::post('store', [ProductController::class, 'store']) -> name ('product.store');
    // Route::get('chitiet/{product}', [ProductController::class, 'chitiet']) -> name ('product.chitiet');
    // Route::delete('delete/{product}', [ProductController::class, 'delete']) -> name ('product.delete');
    // Route::get('edit/{product}', [ProductController::class, 'edit']) -> name ('product.edit');
    // Route::put('update/{product}', [ProductController::class, 'update']) -> name ('product.update');
    // });
    // });


});
 
    