<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\Owner;

class Order extends Model
{
    use SoftDeletes, Owner;
    
    protected $table = "orders";
       
    protected $fillable = ['customer_id', 'status', 'created_by'];
    
    public function items() {
        return $this->hasMany('App\Order\Item', 'order_id', 'id');
    }
    
    public function notes() {
        return $this->hasMany('App\Order\Note', 'order_id', 'id');
    }
}
