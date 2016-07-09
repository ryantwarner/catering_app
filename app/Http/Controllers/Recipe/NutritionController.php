<?php

namespace App\Http\Controllers\Recipe;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Recipe\Nutrition;

class NutritionController extends Controller
{
    public function store() {
        $nutrition = new Nutrition(Input::all());
        return response()->json($nutrition->save());
    }
    
    public function index() {
        return response()->json(Nutrition::all());
    }
    
    public function create() {
        return response()->json(new Nutrition());
    }
    
    public function destroy($id) {
        return response()->json(Nutrition::findOrFail($id)->delete());
    }
    
    public function update($id) {
        return response()->json(Nutrition::findOrFail($id)->update(Input::all()));
    }
    
    public function show($id) {
        return response()->json(Nutrition::with(['recipe'])->findOrFail($id));
    }
    
    public function edit($id) {
        return response()->json(Nutrition::with(['recipe'])->findOrFail($id));
    }
}
