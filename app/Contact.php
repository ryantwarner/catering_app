<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\Owner;

class Contact extends Model
{
    use SoftDeletes, Owner;
    
    protected $table = "contacts";
    
    public function source() {
        return $this->belongsTo('App\Source\Contact', 'contact_id', 'id');
    }
    
    public function customer() {
        return $this->belongsTo('App\Customer\Contact', 'contact_id', 'id');
    }
}
