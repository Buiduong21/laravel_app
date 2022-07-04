<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ url('public/use')}}/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{ url('public/use')}}/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{ url('public/use')}}/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="{{ url('public/use')}}/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="{{ url('public/use')}}/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="{{ url('public/use')}}/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{ url('public/use')}}/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{ url('public/use')}}/css/style.css" type="text/css">
</head>

<body>
    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul> @if (auth()->guard('customer')->check())
                                <li><i class="fa fa-envelope"></i>{{auth()->guard('customer')->user()->email}}</li>
                                @else
                                <li><i class="fa fa-envelope"></i></li>
                                @endif
                                <li>Miễn phí ship toàn quốc</li>
                            </ul>
                        </div>
                    </div>



                    @if (auth()->guard('customer')->check())
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href=""><i class="fa fa-user"></i>{{auth()->guard('customer')->user()->name}} </a>
                            </div>
                            <!-- <div class="header__top__right__auth boder-right">
                                <a href="#"><i class="fa fa-user"></i> Đăng Ký </a>
                            </div> -->
                            <div class="header__top__right__auth">
                                <a href="{{route('use.thoat')}}"><i class="fa fa-user"></i>Thoát</a>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="{{route('use.dangKy')}}"><i class="fa fa-user"></i> Đăng ký</a>
                            </div>
                            <!-- <div class="header__top__right__auth boder-right">
                                <a href="#"><i class="fa fa-user"></i> Đăng Ký </a>
                            </div> -->
                            <div class="header__top__right__auth">
                                <a href="{{route('use.dangNhap')}}"><i class="fa fa-user"></i> Đăng nhập</a>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./index.html"><img src="{{ url('public/use')}}/img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="{{route('use.homeUse')}}">Trang chủ</a></li>

                            <li><a href="{{route('use.homeUse')}}">Danh mục theo sản phẩm</a>
                                <ul class="header__menu__dropdown">
                                    @foreach($categoryUse as $cat)
                                    <li><a
                                            href="{{route('use.danhmuc', ['category'=>$cat->id, 'slug'=>Str::slug($cat->name)])}}">{{$cat->name}}</a>
                                    </li>
                                    @endforeach

                                </ul>
                            </li>
                            <li><a href="{{route('blog.show')}}">Tin Tức</a>

                            </li>

                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <?php $total = 0 ;
                            $total_quantity = 0 ;?>

                        @foreach($carts as $item)
                        <?php
                            $total += ($item -> quantity*$item -> price);
                            $total_quantity += $item -> quantity;
                            ?>
                        @endforeach
                        <ul>
                            @if (auth()->guard('customer')->check())
                            <li><a href="{{route('use.danhSachYeuThich')}}"><i class="fa fa-heart"></i>
                                    <span>{{$products_like->count()}}</span></a></li>
                            @else
                            <li><a href="{{route('use.danhSachYeuThich')}}"><i class="fa fa-heart"></i>
                                    <span>0</span></a></li>
                            @endif

                            <li><a href="{{route('gioHang.view')}}"><i class="fa fa-shopping-bag"></i>
                                    <span>{{$total_quantity}}</span></a></li>

                        </ul>
                        <div class="header__cart__price">Tổng tiền: <span>{{$total}}</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->

    <!-- Hero Section End -->

    <!-- Categories Section Begin -->

    @yield('noidunguse')
    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Sản phẩm</h6>

                        <ul>
                            @foreach($categoryUse as $cat)
                            <li><a
                                    href="{{route('use.danhmuc', ['category'=>$cat->id, 'slug'=>Str::slug($cat->name)])}}">{{$cat->name}}</a>
                            </li>
                            @endforeach
                        </ul>
                        <!-- <ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
                            <li><a href="#">Testimonials</a></li>
                        </ul> -->
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img src="{{ url('public/use')}}/img/logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Địa chỉ: 171 trung kính</li>
                            <li>Số Điện thoại: +65 11.188.888</li>
                            <li>Email: hello@colorlib.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Tìm kiếm thông tin</h6>
                        <p>Nhập thông tin bạn muốn tìm kiếm</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Tìm kiếm</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{ url('public/use')}}/js/jquery-3.3.1.min.js"></script>
    <script src="{{ url('public/use')}}/js/bootstrap.min.js"></script>
    <script src="{{ url('public/use')}}/js/jquery.nice-select.min.js"></script>
    <script src="{{ url('public/use')}}/js/jquery-ui.min.js"></script>
    <script src="{{ url('public/use')}}/js/jquery.slicknav.js"></script>
    <script src="{{ url('public/use')}}/js/mixitup.min.js"></script>
    <script src="{{ url('public/use')}}/js/owl.carousel.min.js"></script>
    <script src="{{ url('public/use')}}/js/main.js"></script>



</body>

</html>