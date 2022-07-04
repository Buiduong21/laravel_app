@extends('master.use')
@section('title', 'In hóa đơn')

@section('noidunguse')


<section class="shoping-cart spad">
    <div class="container">
        <h2 style="text-align: center; margin-bottom: 20px">Hoá đơn bán hàng</h2>
        <!-- <hr> -->

        <p>Họ và tên : {{$order->name}}</p>
        <p>Địa chỉ : {{$order->address}} </p>
        <p>Số điện thoại :{{$order->phone}}</p>



        <table class="table table-hover mb-5  table-bordered rounded ">
            <thead class="table-info">
                <tr>
                    <th>Tên mặt hàng</th>
                    <th class="text-center">Số lượng</th>
                    <th class="text-center">Đơn giá</th>

                </tr>

            </thead>
            <?php $total = 0 ;
                            $total_quantity = 0 ;?>
            @foreach($don_hang as $item)
            <tbody>

                <td>{{$item->product->name}}</td>
                <td class="text-center">{{$item->quantity}}</td>
                <td class="text-center">{{$item->price}}</td>

            </tbody>
            <?php
                            $total += ($item -> quantity*$item -> price);
                          
                            ?>
            @endforeach



            <thead>

                <tr class="table-warning">

                    <th class="border-0"></th>
                    <th class="border-0 text-right ">Tổng Tiền</th>
                    <th class="text-center">{{$total}} </th>
                </tr>
            </thead>

        </table>



    </div>



    </div>


</section>
<!-- Shoping Cart Section End -->

@stop()