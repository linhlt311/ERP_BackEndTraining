<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['name', 'gender', 'email', 'phone_number', 'address', 'JLPT', 'image'];
}
