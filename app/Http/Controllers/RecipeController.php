<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Recipe;

class RecipeController extends Controller
{
    public function store() {
        $recipe = new Recipe(Input::all());
        return response()->json($recipe->save());
    }
    
    public function index() {
        
        return response()->json(Recipe::all());
    }
    
    public function create() {
        return response()->json(new Recipe());
    }
    
    public function destroy($id) {
        return response()->json(Recipe::findOrFail($id)->delete());
    }
    
    public function update($id) {
        return response()->json(Recipe::findOrFail($id)->update(Input::all()));
    }
    
    public function show($id) {
        return response()->json(Recipe::with(['ingredients', 'instructions', 'nutrition'])->findOrFail($id));
    }
    
    public function edit($id) {
        return response()->json(Recipe::with(['ingredients', 'instructions', 'nutrition'])->findOrFail($id));
    }
}
