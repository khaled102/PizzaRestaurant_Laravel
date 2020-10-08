<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $table = 'guests';

    protected $fillable = [
        'name', 'mobile'
    ];

    public function carts()
    {
        return $this->hasMany('App\Models\Cart');
    }
}
