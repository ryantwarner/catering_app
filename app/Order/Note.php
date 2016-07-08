<?php

namespace App\Order;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\Owner;
use App\Traits\ModelValidates;

class Note extends Model
{
    use SoftDeletes, Owner, ModelValidates;
    
    protected $table = "order_notes";
    
    protected $fillable = ['order_id', 'note', 'created_by'];
    
    protected $rules = [
        'order_id' => 'required|exists:orders,id',
        'note' => 'required',
        'created_by' => 'required|exists:users,id'
    ];
    
    public function order() {
        return $this->belongsTo('App\Order', 'order_id', 'id');
    }
}
