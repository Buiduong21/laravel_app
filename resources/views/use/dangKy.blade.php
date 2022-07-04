@extends('master.use')
@section('title', 'Đăng ký tài khoải')

@section('noidunguse')



<div class="container">
    <h2 class="login-box-msg">Đăng ký tài khoản</h2>
    <form action="" method="Post">
        @csrf
        <div class="form-group">
            <label for="">Tên</label>
            <input type="name" class="form-control" name="name" placeholder="Nhập tên để đăng ký">

        </div>
        <div class="form-group ">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Nhập email để đăng ký">

        </div>
        <div class="form-group ">
            <label for="">Số điện thoại</label>
            <input type="phone" class="form-control" name="phone" placeholder="Nhập điện thoại để đăng ký">

        </div>
        <div class="form-group ">
            <label for="">Địa chỉ</label>
            <input type="address" class="form-control" name="address" placeholder="Nhập điện thoại để đăng ký">

        </div>
        <div class="form-group ">
            <label for="">Mật khẩu</label>
            <input type="password" name="password" class="form-control" placeholder="Nhập password để đăng ký">
            @error('password')
            <small class="help block">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group ">
            <label for="">Xác nhận Mật khẩu</label>
            <input type="password" name="confirm_password" class="form-control" placeholder="Nhập password để đăng ký">
            @error('confirm_password')
            <small class="help block">{{$message}}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng ký</button>
    </form>
</div>




@stop()