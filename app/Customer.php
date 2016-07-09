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
        return $this->hasMany('App\Customer\Guest', 'customer_id', 'id');
    }
    
    public function contacts() {
        return $this->hasMany('App\Customer\Contact', 'customer_id', 'id');
    }
}