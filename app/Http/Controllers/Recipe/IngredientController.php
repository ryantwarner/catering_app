<?php

namespace App\Http\Controllers\Recipe;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Recipe\Ingredient;

class IngredientController extends Controller
{
    public function store() {
        $ingredient = new Ingredient(Input::all());
        return response()->json($ingredient->save());
    }
    
    public function index() {
        return response()->json(Ingredient::all());
    }
    
    public function create() {
        return response()->json(new Ingredient());
    }
    
    public function destroy($id) {
        return response()->json(Ingredient::findOrFail($id)->delete());
    }
    
    public function update($id) {
        return response()->json(Ingredient::findOrFail($id)->update(Input::all()));
    }
    
    public function show($id) {
        return response()->json(Ingredient::with(['recipe'])->findOrFail($id));
    }
    
    public function edit($id) {
        return response()->json(Ingredient::with(['recipe'])->findOrFail($id));
    }
}
