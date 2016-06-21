<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\Owner;

class Customer extends Model
{
    use SoftDeletes, Owner;
    
    protected $table = "customers";
    
    public function guests() {
        return $this->hasMany('App\Customer\Guest', 'id', 'customer_id');
    }
    
    public function contacts() {
        return $this->hasMany('App\Customer\Contact', 'id', 'customer_id');
    }
}