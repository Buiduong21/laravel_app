@extends('master.use')
@section('title', 'Trang chủ người dùng')

@section('noidunguse')

<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>Danh mục sản phẩm</span>
                    </div>
                    <ul>
                        @foreach($categoryUse as $cat)
                        <li><a
                                href="{{route('use.danhmuc', ['category'=>$cat->id, 'slug'=>Str::slug($cat->name)])}}">{{$cat->name}}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <!-- <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div> -->
                <div class="hero__item set-bg" data-setbg="{{ url('public/use')}}/img/hero/banner.jpg">
                    <div class="hero__text">
                        <span>Trái cây tươi</span>
                        <h2>Rau củ quả <br />100% Hữu cơ</h2>
                        <p>Miễn phí ship toàn quốc</p>
                        <!-- <a href="{{route('use.homeUse')}}" class="primary-btn">Mua sắm ngay</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="categories">

    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">
                @foreach($proCarousel as $pro)
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="{{url('public/uploads')}}/{{$pro->image}}">
                        <h5><a href="#">{{$pro->name}}</a></h5>
                    </div>

                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->

<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Sản phẩm giảm giá</h2>
                </div>
                <div class="featured__controls">
                    <ul>
                        <li class="active" data-filter="*">Tất cả sản phẩm</li>
                        @foreach($categoryUse as $cat)
                        <li><a style="color:black"
                                href="{{route('use.danhmuc', ['category'=>$cat->id, 'slug'=>Str::slug($cat->name)])}}">{{$cat->name}}</a>
                        </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            @foreach($proSale as $sale)
            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="{{url('public/uploads')}}/{{$sale->image}}">
                        <ul class="featured__item__pic__hover">
                            <!-- yêu thích -->
                            @if(auth()->guard('customer')->check())
                            @if(auth()->guard('customer')->user()->noiYeuthich($sale->id))
                            <li><a href=""><i class="fa fa-heart" style="color:red"></i></a></li>
                            @else
                            <li><a href="{{route('use.yeuThich', $sale->id)}}"><i class="fa fa-heart"></i></a></li>
                            @endif

                            @else
                            <li><a href="{{route('use.dangNhap')}}"><i class="fa fa-heart"></i></a></li>
                            @endif

                            <li><a href="{{route('use.chiTietsp', $sale -> id)}}"><i class="fa fa-retweet"></i></a></li>

                            <!-- gio hàng -->
                            <li><a href="{{route('gioHang.add', $sale->id)}}"><i class="fa fa-shopping-cart"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">{{$sale->name}}</a></h6>
                        <span style="color:red">{{$sale->price}}₫</span>
                        <del style="text:small"><small>{{$sale->sale_price}}₫</small></del>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
<!-- Featured Section End -->

<!-- Banner Begin -->
<div class="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="{{ url('public/use')}}/img/banner/banner-1.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="{{ url('public/use')}}/img/banner/banner-2.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Sản Phẩm Mới Nhất</h2>
                </div>
                <div class="featured__controls">
                    <ul>
                        <li class="active" data-filter="*">Tất cả sản phẩm</li>
                        <!-- <li data-filter=".oranges">Hoa quả</li> -->
                        @foreach($categoryUse as $cat)
                        <li><a style="color:black"
                                href="{{route('use.danhmuc', ['category'=>$cat->id, 'slug'=>Str::slug($cat->name)])}}">{{$cat->name}}</a>
                        </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
        <div class="row featured__filter">

            @foreach($proNew as $new)
            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="{{url('public/uploads')}}/{{$new->image}}">
                        <ul class="featured__item__pic__hover">
                            <!-- yêu thích -->
                            @if(auth()->guard('customer')->check())
                            @if(auth()->guard('customer')->user()->noiYeuthich($new->id))
                            <li><a href=""><i class="fa fa-heart" style="color:red"></i></a></li>
                            @else
                            <li><a href="{{route('use.yeuThich', $new->id)}}"><i class="fa fa-heart"></i></a></li>
                            @endif

                            @else
                            <li><a href="{{route('use.dangNhap')}}"><i class="fa fa-heart"></i></a></li>
                            @endif

                            <li><a href="{{route('use.chiTietsp', $new -> id)}}"><i class="fa fa-retweet"></i></a></li>

                            <!-- gio hàng -->
                            <li><a href="{{route('gioHang.add', $new->id)}}"><i class="fa fa-shopping-cart"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">{{$new->name}}</a></h6>
                        <span style="color:red">{{$new->price}}₫</span>
                        <del style="text:small"><small>{{$new->sale_price}}₫</small></del>
                    </div>
                </div>
            </div>
            @endforeach


        </div>
    </div>
</section>

<section class="from-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title from-blog__title">
                    <h2>Tin tức sản phẩm</h2>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($blogs as $new)
            <div class="col-lg-4 col-md-4 col-sm-6">

                <div class="blog__item">
                    <div class="blog__item__pic">
                        <img src="{{url('public/uploads')}}/{{$new->image}}" alt="">
                    </div>
                    <div class="blog__item__text">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i> {{$new->created_at}}</li>
                            <li><i class="fa fa-comment-o"></i> 5</li>
                        </ul>
                        <h5><a href="{{route('blog.show')}}">{{$new->name}}</a></h5>
                        <p> {{Str::words(strip_tags($new->description), 20)}}</p>
                    </div>
                </div>

            </div>
            @endforeach


        </div>

    </div>
</section>
<!-- Blog Section End -->
@stop()