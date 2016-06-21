<?php

namespace App\Customer\Guest;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\Owner;

class Contact extends Model
{
    use SoftDeletes, Owner;
    
    protected $table = "guest_contact";
    
    public function guest() {
        return $this->belongsTo('App\Customer\Guest', 'guest_id', 'id');
    }
}
