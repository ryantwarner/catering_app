<?php

namespace App\Menu;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\Owner;

class Item extends Model
{
    use SoftDeletes, Owner;
    
    protected $table = "menu_items";
    
    public function menu() {
        return $this->belongsTo('App\Menu', 'menu_id', 'id');
    }
}
