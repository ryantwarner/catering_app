<?php

namespace App\Source;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\Owner;

class Contact extends Model
{
    use SoftDeletes, Owner;
    
    protected $table = "source_contact";
    
    public function source() {
        return $this->belongsTo('App\Source', 'source_id', 'id');
    }
    
    public function contact() {
        return $this->hasOne('App\Contact', 'contact_id', 'id');
    }
}
