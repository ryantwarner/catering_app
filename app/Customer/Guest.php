<?php

namespace App\Customer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\Owner;

class Guest extends Model
{
    use SoftDeletes, Owner;
    
    protected $table = "guests";
    
    public function customer() {
        return $this->belongsTo('App\Customer', 'customer_id', 'id');
    }
    
    public function dietary_restrictions() {
        return $this->hasMany('App\Customer\Guest\DietaryRestriction', 'guest_id', 'id');
    }
    
    public function contact() {
        return $this->hasOne('App\Customer\Guest\Contact', 'id', 'guest_id');
    }
}
