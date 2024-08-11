<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RewardRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'reward_id', 'user_id', 'qty', 'status'
    ];
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function reward()
    {
        return $this->belongsTo(Reward::class);
    }
}
