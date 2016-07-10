<?php

namespace App\Http\Controllers\Backend\Order;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Order\Item;

use App\Traits\ResolvesResponse;

class ItemController extends Controller
{
    use ResolvesResponse;
    
    public function store(Request $request) {
        $item = new Item();
        $request->merge(['order_id' => $request->id]);
        if ($item->validate($request->input())) {
            $saved_item = Item::create($request->input());
            return $request->header('Accept') != 'application/json' ? redirect('admin/orders/' . $request->id) : response()->json($saved_item);
        } else {
            return $request->header('Accept') != 'application/json' ? redirect()->back()->withInput()->withErrors($item->errors()) : response()->json($item->errors());
        }
    }
    
    public function index() {
        return response()->json(Item::all());
    }
    
    public function create(Request $request) {
        return $this->resolve_response($request, new Item(['order_id' => $request->id]));
    }
    
    public function destroy($id) {
        return response()->json(Item::findOrFail($id)->delete());
    }
    
    public function update($id) {
        return response()->json(Item::findOrFail($id)->update(Input::all()));
    }
    
    public function show($id) {
        return response()->json(Item::findOrFail($id));
    }
    
    public function edit($id) {
        return response()->json(Item::findOrFail($id));
    }
    
    public function byOrder(Request $request) {
        return $this->resolve_response($request, Item::where('order_id', $request->id)->get());
    }
}
