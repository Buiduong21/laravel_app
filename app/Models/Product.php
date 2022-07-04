<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'price', 'sale_price','category_id','image', 'status','description','created_at','updated_at'];


    public function cat(){
        return $this->hasOne(Category::class,'id','category_id');
    }
}