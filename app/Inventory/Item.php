<?php

namespace App\Inventory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\Owner;

class Item extends Model
{
    use SoftDeletes, Owner;
    
    protected $table = "inventory_items";
    
    public function inventory() {
        return $this->belongsTo('App\Inventory', 'inventory_id', 'id');
    }
    
    public function source() {
        return $this->hasOne('App\Source', 'id', 'source_id');
    }
}
