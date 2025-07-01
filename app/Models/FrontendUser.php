<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable; // 👈 ye line zaroor honi chahiye
use Illuminate\Notifications\Notifiable;

class FrontendUser extends Authenticatable // 👈 yahan 'Model' ke bajaye 'Authenticatable'


// class FrontendUser extends Model
{
    //
       protected $fillable = [
        'name', 'email', 'password', 'phone', 'city', 'address',
    ];
        public function order()
{
    return $this->hasMany(Order::class);
}
}
