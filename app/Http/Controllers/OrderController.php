<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Input;

use App\Order;

class OrderController extends Controller
{
    public function store() {
        $order = new Order(Input::all());
        return response()->json($order->save());
    }
    
    public function index() {
        return response()->json(Order::all());
    }
    
    public function byStatus($status) {
        return response()->json(Order::where(['status' => $status])->with(['items', 'items.menu_item', 'items.guest', 'items.guest.contact.contact', 'notes'])->get());
    }
    
    public function byCustomer($id) {
        return response()->json(Order::where(['customer_id' => $id])->with(['items', 'items.menu_item', 'items.guest', 'items.guest.contact.contact', 'notes'])->get());
    }
    
    public function create() {
        return response()->json(new Order());
    }
    
    public function destroy($id) {
        return response()->json(Order::findOrFail($id)->delete());
    }
    
    public function update($id) {
        return response()->json(Order::findOrFail($id)->update(Input::all()));
    }
    
    public function show($id) {
        return response()->json(Order::with(['items', 'items.menu_item', 'items.guest', 'items.guest.contact.contact', 'notes'])->findOrFail($id));
    }
    
    public function edit($id) {
        return response()->json(Order::with(['items', 'items.menu_item', 'items.guest', 'items.guest.contact.contact', 'notes'])->findOrFail($id));
    }
}
