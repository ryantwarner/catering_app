<?php

namespace App\Order;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\Owner;

class Item extends Model
{
    use SoftDeletes, Owner;
    
    protected $table = "order_items";
    
    public function order() {
        return $this->belongsTo('App\Order', 'order_id', 'id');
    }
    
    public function menu_item() {
        return $this->hasOne('App\Menu\Item', 'id', 'menu_item_id');
    }
    
    public function guest() {
        return $this->hasOne('App\Customer\Guest', 'id', 'guest_id');
    }
}
