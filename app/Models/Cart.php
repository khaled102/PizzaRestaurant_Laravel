<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';

    protected $fillable = [
        'user_id', 'guest_id', 'total_amount'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function guest()
    {
        return $this->belongsTo('App\Models\Guest');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

    public function cartItems()
    {
        return $this->hasMany('App\Models\CartItem');
    }
}
