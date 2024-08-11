<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $fillable = ['name', 'status'];
    protected $table = 'faculties';

    public static function getAllFaculty()
    {
        return  Faculty::orderBy('id', 'DESC')->paginate(10);
    }
}
