<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;


use Auth;



class CartController extends Controller
{

   public function add($id,$quantity=1){
      $carts = session('cart') ? session('cart') : [];
      if(isset( $carts[$id] ) ){
          $carts[$id]->quantity += $quantity;
      }
      else{
        $pro=Product :: find($id);
        $item=new   \stdClass();
        $item->id = $pro->id;
        $item->name = $pro->name;
        $item->image = $pro->image;
        $item->price = $pro->sale_price>0?$pro->sale_price:$pro->price;
        $item->quantity = $quantity;
        $carts[$id] = $item;
      }
    
        //   dd($carts);
        session(['cart'=> $carts]);
        return redirect()->route('gioHang.view');
    
  
   }

    public function update($id)
    {
    $quantity = request('quantity',1);
    
    $carts = session('cart') ? session('cart') : [];
        if(isset($carts[$id])){
         $carts[$id]->quantity = $quantity;
        session(['cart'=>$carts]);
        
    }     
    
    return redirect()->route('gioHang.view');  
    }

    public function delete($id)
    {
        $carts = session('cart') ? session('cart') : [];
        if(isset($carts[$id])){
         unset($carts[$id]);
        session(['cart'=>$carts]);
    }       
    return redirect()->route('gioHang.view');
    }

    public function clear()
    {
    session(['cart'=>null]);
    return redirect()->route('gioHang.view');
    }

    public function view()
    {
          $carts = session('cart') ? session('cart') : [];
    return view('gioHang.view', compact('carts'));
    }

    public function hoaDon()
    {
          $carts = session('cart') ? session('cart') : [];
        
           return view('gioHang.hoaDon', compact('carts'));
    }
    public function posthoaDon(Request $req)
    {
         $carts = session('cart') ? session('cart') : [];
        $customer_id = auth()->guard('customer')->user()->id;
       if( $order = Order::create([
            'customer_id' => $customer_id,
            'email' => $req->email,
            'name' => $req->name,
            'phone' => $req->phone,
            'address' => $req->address,
        ])){
           $order_id = $order->id;
         foreach($carts as  $item) {
            $quantity = $item->quantity;
            $price = $item->price;
            $product_id = $item->id;
            OrderDetail::create([
                'order_id' => $order_id,
                'quantity' => $quantity,
                'price' => $price,
                'product_id' => $product_id
            ]);          
        }
        session(['cart'=>'']);
         return redirect()->route('gioHang.inHoaDon', $order->id);
       
    }else{
        return redirect()->back();
    }
}

public function inHoaDon(Order $order)
{
    
 $don_hang = $order->order_details1;
//  $mat_hang = $order->order_details1[0]->product->name;
// dd($mat_hang);

// dd($order->order_details1[0]->product->name);
    // $order_details = $order->order_details1;

    // dd($order->order_product);
        //  $orders = Order::where('id',$order);
        //   dd($orders);
        // $demo 
   return view('gioHang.inHoaDon', compact('order','don_hang'));
}
}