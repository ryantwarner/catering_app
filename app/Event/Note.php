<?php

namespace App\Event;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\Owner;
use App\Traits\ModelValidates;

class Note extends Model
{
    use SoftDeletes, Owner, ModelValidates;
    
    protected $table = "event_notes";
    
    protected $fillable = ['event_id', 'note', 'created_by'];
    
    protected $rules = [
        'event_id' => 'required|exists:events,id',
        'note' => 'required',
        'created_by' => 'required|exists:users,id'
    ];
    
    public function event() {
        return $this->belongsTo('App\Event', 'event_id', 'id');
    }
}
