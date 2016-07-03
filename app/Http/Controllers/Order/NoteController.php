<?php

namespace App\Http\Controllers\Order;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Order\Note;

class NoteController extends Controller
{
    public function store() {
        $note = new Note(Input::all());
        return response()->json($note->save());
    }
    
    public function index() {
        return response()->json(Note::all());
    }
    
    public function create() {
        return response()->json(new Note());
    }
    
    public function destroy($id) {
        return response()->json(Note::findOrFail($id)->delete());
    }
    
    public function update($id) {
        return response()->json(Note::findOrFail($id)->update(Input::all()));
    }
    
    public function show($id) {
        return response()->json(Note::findOrFail($id));
    }
    
    public function edit($id) {
        return response()->json(Note::findOrFail($id));
    }
}
