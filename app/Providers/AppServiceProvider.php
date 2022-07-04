<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        view()->composer('*',function($view){
             $carts = session('cart') ? session('cart') : [];
             if( auth()->guard('customer')->check()){
        $products_like = auth()->guard('customer')->user()->yeuThich;
             }
       else{
           $products_like =[];
       }
            $categoryUse = Category::orderBy('name','ASC')->where('status',1)->get();
            $view->with(compact('categoryUse','carts','products_like'));

        });
    }
   
}