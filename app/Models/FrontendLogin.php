<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FrontendLogin extends Model
{
    //
       protected $fillable = [
        'name', 'email', 'password', 'phone', 'city', 'address',
    ];
}
