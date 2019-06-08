<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    // protected $table = 'tickets';
    // protected $fillable = ['title', 'content', 'slug', 'status', 'user_id'];
    protected $guarded = ['id'];


}
