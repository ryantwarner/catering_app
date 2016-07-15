<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\Owner;
use App\Traits\ModelValidates;

class Event extends Model
{
    use SoftDeletes, Owner, ModelValidates;
    
    protected $table = "events";
       
    protected $fillable = ['customer_id', 'name', 'status', 'created_by'];
    
    protected $rules = [
        'customer_id' => 'required|integer',
        'name' => 'required',
        'status' => 'required|in:open,closed,cancelled,in_progress,complete,invoiced,paid,arrears',
        'created_by' => 'required|integer'
    ];
    
    public function items() {
        return $this->hasMany('App\Event\Item', 'event_id', 'id');
    }
    
    public function notes() {
        return $this->hasMany('App\Event\Note', 'event_id', 'id');
    }
    
    public function customer() {
        return $this->hasOne('App\Customer', 'id', 'customer_id');
    }
}
