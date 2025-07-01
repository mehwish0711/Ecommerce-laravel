<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory; 

    protected $guarded = [];

   
   public function category(){
    return $this->belongsTo(Category::class,'category_id');
   }
   public function subcategory(){
     return $this->belongsTo(SubCategory::class, 'sub_cate_id');
   }

    public function orderitems(){
    return $this->hasMany(OrderItem::class,'product_id');
   }
   
}
