<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;

class Product extends Model
{
    protected $fillable = ['title', 'description', 'cat_id', 'price', 'status', 'photo'];

    public function cat_info()
    {
        return $this->hasOne('App\Models\Category', 'id', 'cat_id');
    }
    public static function getAllProduct()
    {
        return Product::with(['cat_info'])->orderBy('title', 'asc')->paginate(10);
    }
    public function rel_prods()
    {
        return $this->hasMany('App\Models\Product', 'cat_id', 'cat_id')->where('status', 'active')->orderBy('id', 'DESC')->limit(8);
    }
    public static function countActiveProduct()
    {
        $data = Product::where('status', 'active')->count();
        if ($data) {
            return $data;
        }
        return 0;
    }
}
