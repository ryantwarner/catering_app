<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Input;

use App\Menu;

class MenuController extends Controller
{
    public function store() {
        $menu = new Menu(Input::all());
        return response()->json($menu->save());
    }
    
    public function index() {
        return response()->json(Menu::all());
    }
    
    public function create() {
        return response()->json(new Menu());
    }
    
    public function destroy($id) {
        return response()->json(Menu::findOrFail($id)->delete());
    }
    
    public function update($id) {
        return response()->json(Menu::findOrFail($id)->update(Input::all()));
    }
    
    public function show($id) {
        return response()->json(Menu::with(['items'])->findOrFail($id));
    }
    
    public function edit($id) {
        return response()->json(Menu::with(['items'])->findOrFail($id));
    }
}
