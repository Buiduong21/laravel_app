<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class AdminController extends Controller
{

    public function dangky()
    {
       return view('admin.dangky');
    }
     public function hungdangky(Request $req)
    {
        // dd($req);
         $data = $req->only('email','name');
         $data['password'] = bcrypt($req -> password);
         user::create($data);
         return redirect()->route('category.index')->with('ok', 'Đăng ký thành công');
    }
    public function login()
    {
        // \App\Models\User::create([
        //     'name' => 'admin1',
        //     'email' => 'admin@email.com',
        //     'password' => 'bcrypt(123456)'
        // ]);
    return view('admin.login');
    }
    public function check_login (Request $req)
    {
        // dd($req);
        $data = $req->only('email','password');
          $check = Auth()->attempt($data);
        
    // dd($check);
        if ($check){
           
        return redirect()->route('category.index')->with('ok', 'Chào mừng trở lại');
        }
        return redirect()->back()->with('no', 'Đăng nhập thất bại');
    }


    public function logout()
    {
       auth()->logout();
      return redirect()->route('category.index');
    }
  

}