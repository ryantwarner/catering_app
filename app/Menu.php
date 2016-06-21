<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\Owner;

class Menu extends Model
{
    use SoftDeletes, Owner;
    
    protected $table = "menus";
    
    public function items() {
        return $this->hasMany('App\Menu\Item', 'id', 'menu_id');
    }
}
