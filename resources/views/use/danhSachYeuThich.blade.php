@extends('master.use')
@section('title', 'Danh sách yêu thích')

@section('noidunguse')



<section class="featured spad">
    <div class="container">

        <div class="row featured__filter">
            @foreach($products as $sale)

            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="{{url('public/uploads')}}/{{$sale->image}}">
                        <ul class="featured__item__pic__hover">
                            <!-- yêu thích -->
                            @if(auth()->guard('customer')->check())
                            @if(auth()->guard('customer')->user()->noiYeuthich($sale->id))
                            <li><a href="{{route('use.xoaYeuThich', $sale->id)}}"><i class="fa fa-heart"
                                        style="color:red"></i></a></li>
                            @else
                            <li><a href="{{route('use.yeuThich', $sale->id)}}"><i class="fa fa-heart"></i></a></li>
                            @endif

                            @else
                            <li><a href="{{route('use.dangNhap')}}"><i class="fa fa-heart"></i></a></li>
                            @endif

                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
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




@stop()