@extends('master.admin')
@section('title', 'Chi tiết sản phẩm')

@section('noidungadmin')



<div class="container">
    <div class="row">
        <div class="col-md-5">
            <img src="{{url('public/uploads/'.$product->image)}}" alt="" width="300">
        </div>
        <div class="col-md-7">
            <h2>{{$product->name}}</h2>
            <h4>Giá gốc: {{$product->price}}</h4>
            <h4>Giá gốc: {{$product->sale_price}}</h4>
            <p>
                {{Str::words(strip_tags($product->description), 20)}}</p>
        </div>
    </div>
</div>

<hr>
<h2>Mô tả đầy đủ</h2>
<div>
    <p>{!! $product->description !!}</p>
</div>



@stop()