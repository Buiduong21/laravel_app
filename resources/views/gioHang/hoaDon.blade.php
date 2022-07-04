@extends('master.use')
@section('title', 'Giỏ hàng')

@section('noidunguse')

<section class="checkout spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code
                </h6>
            </div>
        </div>
        <div class="checkout__form">
            <h4>Đặt hàng</h4>
            <form action="{{route('gioHang.posthoaDon')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-8 col-md-6">

                        <div class="checkout__input">
                            <p>Tên</p>
                            <input type="text" value="{{auth()->guard('customer')->user()->name}}" name="name">
                        </div>
                        <div class="checkout__input">
                            <p>Email</p>
                            <input type="email" value="{{auth()->guard('customer')->user()->email}}" name="email">
                        </div>
                        <div class="checkout__input">
                            <p>Số điện thoại</p>
                            <input type="number" value="{{auth()->guard('customer')->user()->phone}}" name="phone">
                        </div>
                        <div class="checkout__input">
                            <p>Địa chỉ</p>
                            <input type="text" value="{{auth()->guard('customer')->user()->address}}" name="address">
                        </div>
                        <!-- <div class="checkout__input__checkbox">
                            <label for="acc">
                                Create an account?
                                <input type="checkbox" id="acc">
                                <span class="checkmark"></span>
                            </label>
                        </div> -->
                        <!-- <p>Create an account by entering the information below. If you are a returning customer
                            please login at the top of the page</p>
                        <div class="checkout__input">
                            <p>Account Password<span>*</span></p>
                            <input type="text">
                        </div>
                        <div class="checkout__input__checkbox">
                            <label for="diff-acc">
                                Ship to a different address?
                                <input type="checkbox" id="diff-acc">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="checkout__input">
                            <p>Order notes<span>*</span></p>
                            <input type="text" placeholder="Notes about your order, e.g. special notes for delivery.">
                        </div> -->
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Đơn hàng của bạn</h4>
                            <?php $total = 0 ;
                            $total_quantity = 0 ;?>

                            <div class="checkout__order__products">Products <span>Total</span></div>
                            @foreach($carts as $item)
                            <?php
                            $total += ($item -> quantity*$item -> price);
                            $total_quantity += $item -> quantity;
                            ?>
                            <ul>

                                <li>{{$item->name}}<span> {{$item -> quantity*$item -> price}}₫</span></li>

                            </ul>
                            @endforeach

                            <div class="checkout__order__total">Total <span>{{$total}}</span></div>
                            <button type="submit" class="site-btn">Đặt hàng</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>


@stop()