<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'order_id',
        'customer_id',
        'product_id',
        'namaMobil',
        'plat',
        'harga',
        'img',
        'status'
    ];
}
