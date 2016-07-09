<?php

namespace App\Http\Controllers\Customer\Guest;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Customer\Guest\DietaryRestriction;

class DietaryRestrictionController extends Controller
{
    public function store() {
        $dietary_restriction = new DietaryRestriction(Input::all());
        return response()->json($dietary_restriction->save());
    }
    
    public function index() {
        return response()->json(DietaryRestriction::all());
    }
    
    public function create() {
        return response()->json(new DietaryRestriction());
    }
    
    public function destroy($id) {
        return response()->json(DietaryRestriction::findOrFail($id)->delete());
    }
    
    public function update($id) {
        return response()->json(DietaryRestriction::findOrFail($id)->update(Input::all()));
    }
    
    public function show($id) {
        return response()->json(DietaryRestriction::findOrFail($id));
    }
    
    public function edit($id) {
        return response()->json(DietaryRestriction::findOrFail($id));
    }
}
