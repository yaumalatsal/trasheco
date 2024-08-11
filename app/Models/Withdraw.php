<?php

namespace App\Models;

use App\Http\Middleware\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'amount', 'status', 'created_by'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
