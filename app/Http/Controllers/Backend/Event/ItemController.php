<?php

namespace App\Http\Controllers\Backend\Event;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Event\Item;

use App\Traits\ResolvesResponse;

class ItemController extends Controller
{
    use ResolvesResponse;
    
    public function store(Request $request) {
        $item = new Item();
        $request->merge(['event_id' => $request->id]);
        if ($item->validate($request->input())) {
            $saved_item = Item::create($request->input());
            return $request->header('Accept') != 'application/json' ? redirect('admin/events/' . $request->id) : response()->json($saved_item);
        } else {
            return $request->header('Accept') != 'application/json' ? redirect()->back()->withInput()->withErrors($item->errors()) : response()->json($item->errors());
        }
    }
    
    public function index() {
        return response()->json(Item::all());
    }
    
    public function create(Request $request) {
        return $this->resolve_response($request, new Item(['event_id' => $request->id]));
    }
    
    public function destroy(Request $request, $id) {
         if (empty($request->delete)) {
            return $this->resolve_response(Item::findOrFail($id)->delete());
        } else {
            $deleted = [];
            foreach ($request->delete as $key => $delete) {
                $deleted[$delete] = Item::findOrFail($delete)->delete();
            }
            return $request->header('Accept') == 'application/json' ? response()->json($deleted) : redirect()->back()->withInput()->withSuccess(["Successfully deleted ".count($delete)." events"]);
        }
    }
    
    public function update(Request $request, $id, $items) {
        $event_item = Item::findOrFail($items);
        $request->merge(['event_id' => $id]);
        if ($event_item->validate($request->input())) {
            $result = $event_item->update($request->input());
            return $request->header('Accept') != 'application/json' ? redirect('admin/events/' . $id . "/items/" . $items . "/edit") : response()->json($result);
        } else {
            return $request->header('Accept') != 'application/json' ? redirect()->back()->withInput()->withErrors($event_item->errors()) :response()->json($event_item->errors());
        }
    }
    
    public function show(Request $request, $id, $items) {
        return $this->resolve_response($request, Item::findOrFail($items));
    }
    
    public function edit(Request $request, $id, $items) {
        return $this->resolve_response($request, Item::findOrFail($items));
    }
    
    public function byEvent(Request $request) {
        return $this->resolve_response($request, Item::where('event_id', $request->id)->get());
    }
}
