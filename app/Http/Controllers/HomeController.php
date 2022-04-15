<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;



class HomeController extends Controller
{
    public function home(){
        $cats = Category::all();
        return view('home', compact('cats'));
    }
}