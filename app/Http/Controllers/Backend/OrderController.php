<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;;

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
            $saved_order = Order::create($request->input());
            return $request->header('Accept') != 'application/json' ? redirect('admin/orders/' . $saved_order->id) : response()->json($saved_order);
        } else {
            return $request->header('Accept') != 'application/json' ? redirect()->back()->withInput()->withErrors($order->errors()) : response()->json($order->errors());
        }
    }
    
    public function index(Request $request) {
        return $this->resolve_response($request, Order::whereNotIn('status', ['closed','cancelled','complete','paid'])->groupBy('customer_id')->get());
    }
    
    public function byStatus(Request $request) {
        return response()->json(Order::where(['status' => $request->status])->with(['items', 'items.menu_item', 'items.guest', 'items.guest.contact.contact', 'notes'])->get());
    }
    
    public function byCustomer(Request $request) {
        return $this->resolve_response($request, collect(['id' => $request->id, 'orders' => Order::where(['customer_id' => $request->id])->with(['items', 'items.menu_item', 'items.guest', 'items.guest.contact.contact', 'notes'])->get()]));
    }
    
    public function create(Request $request) {
        return $this->resolve_response($request, new Order());
    }
    
    public function destroy(Request $request, $id) {
        if (empty($request->delete)) {
            return $this->resolve_response(Order::findOrFail($id)->delete());
        } else {
            $deleted = [];
            foreach ($request->delete as $key => $delete) {
                $deleted[$delete] = Order::findOrFail($delete)->delete();
            }
            return $request->header('Accept') == 'application/json' ? response()->json($deleted) : redirect()->back()->withInput()->withSuccess("Successfully deleted ".count($delete)." orders");
        }
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
        $order = Order::with(['customer', 'items', 'items.menu_item', 'items.guest', 'items.guest.contact', 'items.guest.contact.contact', 'notes'])->findOrFail($id);
        return $this->resolve_response($request, $order);
    }
    
    public function edit(Request $request, $id) {
        $order = Order::with(['customer', 'items', 'items.menu_item', 'items.guest', 'items.guest.contact.contact', 'notes'])->findOrFail($id);
        return $this->resolve_response($request, $order);
    }
}
