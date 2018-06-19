<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    public $timestamps = false;
    protected $primaryKey = null;
    public $incrementing = false;
    
    protected $fillable = [
        'user_id', 'friend_id', 'created_at'
    ];

}
