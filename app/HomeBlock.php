<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeBlock extends Model
{
    protected $fillable = array('title', 'text', 'image');
}
