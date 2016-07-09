<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\Owner;

class Source extends Model
{
    use SoftDeletes, Owner;
    
    protected $table = "sources";
    
    public function contacts() {
        return $this->hasMany("App\Source\Contact", "source_id", "id");
    }
}
