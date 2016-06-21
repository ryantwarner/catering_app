<?php

namespace App\Order;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\Owner;

class Note extends Model
{
    use SoftDeletes, Owner;
    
    protected $table = "order_notes";
    
    public function order() {
        return $this->belongsTo('App\Order', 'order_id', 'id');
    }
}
