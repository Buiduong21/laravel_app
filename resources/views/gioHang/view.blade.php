@extends('master.use')
@section('title', 'Giỏ hàng')

@section('noidunguse')


<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{url('public/use')}}/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Giỏ hàng</h2>
                    <div class="breadcrumb__option">
                        <a href="">Trang chủ</a>
                        <span>Giỏ hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php $total = 0 ;
                $total_quantity = 0 ;?>
                <div class="shoping__cart__table">
                    @if(count($carts))
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($carts as $item)
                            <?php
                            $total += ($item -> quantity*$item -> price);
                            $total_quantity += $item -> quantity;
                            ?>
                            <tr>
                                <td>
                                    <img src="{{url('public/uploads')}}/{{$item->image}}" alt="" style="width: 60px;">
                                    <h5>{{$item -> name}}</h5>
                                </td>
                                <td>
                                    {{$item -> price}}₫
                                </td>
                                <td>
                                    <form action="{{route('gioHang.update', $item -> id )}}" method="GET"
                                        class="form-inline" role="form">
                                        <div class="form-group">
                                            <input class="form-control" id="quantity" name="quantity"
                                                value="{{$item -> quantity}}">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Cập nhập</button>
                                    </form>

                                </td>
                                <td>
                                    {{$item -> quantity*$item -> price}}₫
                                </td>
                                <td>
                                    <a class="btn btn-success" href="{{route('gioHang.delete', $item -> id )}}">Xóa</a>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="{{route('use.homeUse')}}" class="primary-btn cart-btn">Tiếp tục mua hàng</a>
                    <a href="{{route('gioHang.clear')}}" class="primary-btn cart-btn cart-btn-right"><span
                            class="icon_loading"></span>
                        Xóa giỏ hàng</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__continue">
                    <!-- <div class="shoping__discount">
                        <h5>Mã giảm giá</h5>
                        <form action="#">
                            <input type="text" placeholder="Nhập mã giảm giá">
                            <button type="submit" class="site-btn">Áp dụng</button>
                        </form>
                    </div> -->
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Tổng thanh toán</h5>
                    <ul>
                        <li>Tổng số lượng<span>{{$total_quantity}}</span></li>
                        <li>Tổng tiền<span>{{$total}}</span></li>
                    </ul>
                    @if(auth()->guard('customer')->check())
                    <a href="{{route('gioHang.hoaDon')}}" class="primary-btn">Mua hàng</a>
                    @else
                    <a href="{{route('use.dangNhap')}}" class="primary-btn">Đăng nhập để mua hàng</a>
                    @endif
                </div>
            </div>
        </div>
        @else
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Giỏ hàng không có sản phẩm..................</strong>

        </div>

        <button type="button" class="btn btn-success"> <a class="btn text-white" href="{{route('use.homeUse')}}">Mua
                hàng</a></button>
        @endif
    </div>
</section>
<!-- Shoping Cart Section End -->

@stop()