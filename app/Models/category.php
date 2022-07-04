<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'status'];
    protected $dates = ['deleted_at'];


    public function products(){
        return $this->hasMany(Product::class, 'category_id','id');
    }


    
     public function scopeSearch($query){
          if(request('key')){
             $key = request('key');
             $query = $this->where ('name','like','%'.$key.'%');
         }
        return $query;
    }
   public function scopeAdd()
   {
       return $this->create(request() -> only('name', 'status'));
   }
   public function scopeUpdateCat()
   {
      return $this -> update(request() -> only('name', 'status'));
   }
}