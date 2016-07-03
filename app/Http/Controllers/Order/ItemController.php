<?php

namespace App\Http\Controllers\Order;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Order\Item;

class ItemController extends Controller
{
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
}
