<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messsage extends Model
{
    protected $fillable = [
        'sender_id',
        'receiver_id',
        'title',
        'content',
    ];
}
