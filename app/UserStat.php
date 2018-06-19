<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserStat extends Model
{
    protected $table = 'user_stats';
    public $timestamps = false;
    protected $primaryKey = null;
    public $incrementing = false;
}
