<?php

namespace App\Http\Controllers\Recipe;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Recipe\Instruction;

class InstructionController extends Controller
{
    public function store() {
        $instruction = new Instruction(Input::all());
        return response()->json($instruction->save());
    }
    
    public function index() {
        return response()->json(Instruction::all());
    }
    
    public function create() {
        return response()->json(new Instruction());
    }
    
    public function destroy($id) {
        return response()->json(Instruction::findOrFail($id)->delete());
    }
    
    public function update($id) {
        return response()->json(Instruction::findOrFail($id)->update(Input::all()));
    }
    
    public function show($id) {
        return response()->json(Instruction::with(['recipe'])->findOrFail($id));
    }
    
    public function edit($id) {
        return response()->json(Instruction::with(['recipe'])->findOrFail($id));
    }
}
