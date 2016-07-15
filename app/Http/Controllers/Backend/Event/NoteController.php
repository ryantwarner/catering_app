<?php

namespace App\Http\Controllers\Backend\Event;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Event\Note;

use App\Traits\ResolvesResponse;

class NoteController extends Controller
{
    use ResolvesResponse;
    
    public function store(Request $request) {
        $note = new Note();
        $request->merge(['event_id' => $request->id]);
        if ($note->validate($request->input())) {
            $saved_note = Note::create($request->input());
            return $request->header('Accept') != 'application/json' ? redirect('admin/events/' . $request->id) : response()->json($saved_note);
        } else {
            return $request->header('Accept') != 'application/json' ? redirect()->back()->withInput()->withErrors($note->errors()) : response()->json($note->errors());
        }
    }
    
    public function index() {
        return response()->json(Note::all());
    }
    
    public function create(Request $request) {
        return $this->resolve_response($request, new Note(['event_id' => $request->id]));
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
