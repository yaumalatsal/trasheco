<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'order_number',  'total_amount'];

    public static function countActiveOrder()
    {
        $data = Order::count();
        if ($data) {
            return $data;
        }
        return 0;
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function orderedProducts()
    {
        return $this->hasMany(OrderedProduct::class);
    }
}
