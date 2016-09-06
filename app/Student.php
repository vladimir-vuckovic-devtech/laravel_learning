<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /*public $username;
    public $password;*/
    protected $fillable = ['username', 'password'];
    public $timestamps = false;
}
