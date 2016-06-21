<?php

namespace App\Recipe;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\Owner;

class Ingredient extends Model
{
    use SoftDeletes, Owner;
    protected $table = "recipe_ingredients";
    
    public function recipe() {
        return $this->belongsTo('App\Recipe', 'recipe_id', 'id');
    }
}
