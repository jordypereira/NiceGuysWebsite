<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeBlock extends Model
{
    protected $fillable = array('title', 'text', 'image');

    /**
     * Get the order associated with the block.
     */
    public function order()
    {
        return $this->hasOne('App\Order');
    }
}
