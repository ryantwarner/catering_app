<?php

namespace App\Traits;

trait Owner {
    
    public function owner() {
        return $this->belongsTo('App\User', 'created_by', 'id');
    }
    
}