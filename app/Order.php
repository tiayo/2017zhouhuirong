<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'commodity',
        'address',
        'phone',
        'price',
        'type',
        'tracking',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
