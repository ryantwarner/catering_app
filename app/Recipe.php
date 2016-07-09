<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\Owner;

class Recipe extends Model
{
    use SoftDeletes, Owner;
    
    protected $table = "recipes";
    
    public function ingredients() {
        return $this->hasMany("App\Recipe\Ingredient", "recipe_id", "id");
    }
    
    public function instructions() {
        return $this->hasMany("App\Recipe\Instruction", "recipe_id", "id");
    }
    
    public function nutrition() {
        return $this->hasOne("App\Recipe\Nutrition", "recipe_id", "id");
    }
}
