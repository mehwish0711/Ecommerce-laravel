<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class order extends Model
{

     use HasFactory; 

    protected $guarded = [];
    //
    public function orderItems()
{
    return $this->hasMany(OrderItem::class, 'order_id');
}
    public function product()
{
    return $this->hasMany(OrderItem::class, 'order_id');
}
    public function frontenduser()
{
    return $this->belongsTo(FrontendUser::class, 'customer_id');
}
}
