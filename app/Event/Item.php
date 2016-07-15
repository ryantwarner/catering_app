<?php

namespace App\Event;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\Owner;
use App\Traits\ModelValidates;

class Item extends Model
{
    use SoftDeletes, Owner, ModelValidates;
    
    protected $fillable = ['event_id', 'guest_id', 'menu_item_id', 'note', 'created_by'];
    
    protected $table = "event_items";
    
    protected $rules = [
        'event_id' => 'required|exists:events,id',
        'guest_id' => 'required|exists:guests,id',
        'menu_item_id' => 'required|exists:menu_items,id',
        'created_by' => 'required|exists:users,id'
    ];
    
    public function event() {
        return $this->belongsTo('App\Event', 'event_id', 'id');
    }
    
    public function menu_item() {
        return $this->hasOne('App\Menu\Item', 'id', 'menu_item_id');
    }
    
    public function guest() {
        return $this->hasOne('App\Customer\Guest', 'id', 'guest_id');
    }
}
