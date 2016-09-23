<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DBLogger extends Model
{
    protected $fillable = ['loggs', 'type'];
    protected $table = 'logs';
}
