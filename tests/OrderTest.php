<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class OrderTest extends TestCase
{
    public function testOrders() {
        $this->get('order/1')
             ->seeJson(['id' => 1, 'deleted_at' => null]);
        
        $this->delete('order/1')
             ->notSeeInDatabase('orders', ['deleted_at' => null, 'id' => 1]);
        
        $this->put('order/2', ['status' => 'paid'])
             ->seeInDatabase('orders', ['status' => 'paid', 'id' => 2]);
        
        $this->post('order', ['status' => 'open', 'customer_id' => 1, 'created_by' => 1])->seeInDatabase('orders', ['status' => 'open', 'customer_id' => 1, 'created_by' => 1]);
    }
}
