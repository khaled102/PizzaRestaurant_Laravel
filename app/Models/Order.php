<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'cart_id', 'user_id', 'guest_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function guest()
    {
        return $this->belongsTo('App\Models\Guest');
    }

    public function cart()
    {
        return $this->belongsTo('App\Models\Cart');
    }
}
