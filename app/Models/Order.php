<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    

   protected $fillable = ['name', 'email', 'phone','address','customer_id','status'];
   
    public function order_details1(){
        return $this->hasMany(OrderDetail::class, 'order_id','id');
    }
    
}