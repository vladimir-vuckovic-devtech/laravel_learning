<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DBLogger extends Model
{
    protected $fillable = ['log_info'];
    protected $table = 'logs';
}
