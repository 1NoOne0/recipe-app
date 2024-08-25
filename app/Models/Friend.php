<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    protected $table = 'friends';
    protected $fillable = ['user_email', 'friend_email', 'status', 'started_at'];
}
