<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\Owner;
use App\Traits\ModelValidates;

class Order extends Model
{
    use SoftDeletes, Owner, ModelValidates;
    
    protected $table = "orders";
       
    protected $fillable = ['customer_id', 'status', 'created_by'];
    
    protected $rules = [
        'customer_id' => 'required|integer',
        'status' => 'required|in:closed,paid,arrears,invoiced,open',
        'created_by' => 'required|integer'
    ];
    
    public function items() {
        return $this->hasMany('App\Order\Item', 'order_id', 'id');
    }
    
    public function notes() {
        return $this->hasMany('App\Order\Note', 'order_id', 'id');
    }
    
    public function customer() {
        return $this->hasOne('App\Customer', 'id', 'customer_id');
    }
}
