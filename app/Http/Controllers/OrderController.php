<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Input;

use App\Traits\ResolvesResponse;

use App\Order;

class OrderController extends Controller
{
    use ResolvesResponse;
    
    public function store(Request $request) {
        $order = new Order();
        if ($order->validate($request->input())) {
            return response()->json($order->fill($request->input())->save());
        } else {
            return response()->json($order->errors());
        }
    }
    
    public function index() {
        return response()->json(Order::all());
    }
    
    public function byStatus(Request $request) {
        return response()->json(Order::where(['status' => $request->status])->with(['items', 'items.menu_item', 'items.guest', 'items.guest.contact.contact', 'notes'])->get());
    }
    
    public function byCustomer(Request $request) {
        return response()->json(Order::where(['customer_id' => $request->id])->with(['items', 'items.menu_item', 'items.guest', 'items.guest.contact.contact', 'notes'])->get());
    }
    
    public function create() {
        return response()->json(new Order());
    }
    
    public function destroy(Request $request, $id) {
        return response()->json(Order::findOrFail($id)->delete());
    }
    
    public function update(Request $request, $id) {
        $order = Order::findOrFail($id);
        if ($order->validate($request->input())) {
            return response()->json($order->update($request->input()));
        } else {
            return response()->json($order->errors());
        }
    }
    
    public function show(Request $request, $id) {
        $order = Order::with(['customer', 'items', 'items.menu_item', 'items.guest', 'items.guest.contact.contact', 'notes'])->findOrFail($id);
        return $this->resolve_response($request, $order);
    }
    
    public function edit(Request $request, $id) {
        $order = Order::with(['customer', 'items', 'items.menu_item', 'items.guest', 'items.guest.contact.contact', 'notes'])->findOrFail($id);
        return $this->resolve_response($request, $order);
    }
}
