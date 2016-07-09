<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Source;

class SourceController extends Controller
{
    public function store() {
        $source = new Source(Input::all());
        return response()->json($source->save());
    }
    
    public function index() {
        return response()->json(Source::all());
    }
    
    public function create() {
        return response()->json(new Source());
    }
    
    public function destroy($id) {
        return response()->json(Source::findOrFail($id)->delete());
    }
    
    public function update($id) {
        return response()->json(Source::findOrFail($id)->update(Input::all()));
    }
    
    public function show($id) {
        return response()->json(Source::findOrFail($id));
    }
    
    public function edit($id) {
        return response()->json(Source::findOrFail($id));
    }
}
