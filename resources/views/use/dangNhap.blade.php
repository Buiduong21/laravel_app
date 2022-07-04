@extends('master.use')
@section('title', 'Đăng nhập tài khoản')

@section('noidunguse')


<div class="container">
    <h2 class="login-box-msg">Đăng nhập tài khoản</h2>
    <form action="" method="Post">
        @csrf
        <div class="form-group">
            <label for="">Mail</label>
            <input type="email" class="form-control" name="email" placeholder="Nhập tên để đăng nhập">

        </div>
        <div class="form-group ">
            <label for="">Mật khẩu</label>
            <input type="password" name="password" class="form-control" placeholder="Nhập password để đăng nhập">
            @error('password')
            <small class="help block">{{$message}}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng nhập</button>
    </form>
</div>


@stop()