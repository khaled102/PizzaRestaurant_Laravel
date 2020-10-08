<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $table = 'cart_items';

    protected $fillable = [
        'cart_id', 'item_id'
    ];

    public function cart()
    {
        return $this->belongsTo('App\Models\Cart');
    }

    public function item()
    {
        return $this->belongsTo('App\Models\Item');
    }
}
