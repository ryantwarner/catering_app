<?php

namespace App\Http\Controllers\Order;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Order\Item;

use App\Traits\ResolvesResponse;

class ItemController extends Controller
{
    use ResolvesResponse;
    
    public function store() {
        $item = new Item(Input::all());
        return response()->json($item->save());
    }
    
    public function index() {
        return response()->json(Item::all());
    }
    
    public function create() {
        return response()->json(new Item());
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
