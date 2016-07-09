<?php

namespace App\Customer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\Owner;

class Contact extends Model
{
    use SoftDeletes, Owner;
    
    protected $table = "customer_contact";
    
    public function customer() {
        return $this->belongsTo('App\Customer', 'customer_id', 'id');
    }
}
