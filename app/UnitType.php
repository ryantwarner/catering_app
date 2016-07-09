<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\Owner;

class UnitType extends Model
{
    use SoftDeletes, Owner;
    
    protected $table = "unit_types";
}
