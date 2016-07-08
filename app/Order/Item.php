<?php

namespace App\Order;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\Owner;
use App\Traits\ModelValidates;

class Item extends Model
{
    use SoftDeletes, Owner, ModelValidates;
    
    protected $fillable = ['order_id', 'guest_id', 'menu_item_id', 'note', 'created_by'];
    
    protected $table = "order_items";
    
    protected $rules = [
        'order_id' => 'required|exists:orders,id',
        'guest_id' => 'required|exists:guests,id',
        'menu_item_id' => 'required|exists:menu_items,id',
        'created_by' => 'required|exists:users,id'
    ];
    
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
