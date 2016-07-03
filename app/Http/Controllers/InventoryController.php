<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Inventory;

class InventoryController extends Controller
{
    public function store() {
        $inventory = new Inventory(Input::all());
        return response()->json($inventory->save());
    }
    
    public function index() {
        return response()->json(Inventory::all());
    }
    
    public function create() {
        return response()->json(new Inventory());
    }
    
    public function destroy($id) {
        return response()->json(Inventory::findOrFail($id)->delete());
    }
    
    public function update($id) {
        return response()->json(Inventory::findOrFail($id)->update(Input::all()));
    }
    
    public function show($id) {
        return response()->json(Inventory::with('items')->findOrFail($id));
    }
    
    public function edit($id) {
        return response()->json(Inventory::with('items')->findOrFail($id));
    }
}
