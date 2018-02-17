<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'gender', 'email', 'phone_number', 'address', 'JLPT', 'image'];

    protected $attributes = [
        'image' => '/images/y3hdomBA0wWUY5k7D1iKHDQl6KN7HCsNNEMzLZ7T.png',
    ];

    protected $dates = ['deleted_at'];
}
