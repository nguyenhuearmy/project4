<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['id','name', 'link', 'user_id'];
    public $timestamps = false;
}
