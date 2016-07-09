<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class OrderTest extends TestCase
{
    public function testGetOrder() {
        $this->get('order/1')
                ->seeJson(['id' => 1, 'deleted_at' => null]);
    }
    
    public function testDeleteOrder() {
        $this->delete('order/1')
                ->notSeeInDatabase('orders', ['deleted_at' => null, 'id' => 1]);
    }
    
    public function testUpdateOrder() {
        $this->put('order/2', ['status' => 'paid'])
                ->seeInDatabase('orders', ['status' => 'paid', 'id' => 2]);
    }
    
    public function testNewOrder() {
        $this->post('order', ['status' => 'open', 'customer_id' => 1, 'created_by' => 1])
                ->seeInDatabase('orders', ['status' => 'open', 'customer_id' => 1, 'created_by' => 1]);
    }
    
    public function testOrderValidation() {
        $this->post('order', ['status' => 'boo', 'customer_id' => 1, 'created_by' => 1])
                ->seeJson(['status' => ['The selected status is invalid.']])
                ->notSeeInDatabase('orders', ['status' => '', 'customer_id' => 1, 'created_by' => 1]);
    }
}
