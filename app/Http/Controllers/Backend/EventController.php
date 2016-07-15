<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Input;

use App\Traits\ResolvesResponse;

use App\Event;

class EventController extends Controller
{
    use ResolvesResponse;
    
    public function store(Request $request) {
        $event = new Event();
        if ($event->validate($request->input())) {
            $saved_event = Event::create($request->input());
            return $request->header('Accept') != 'application/json' ? redirect('admin/events/' . $saved_event->id) : response()->json($saved_event);
        } else {
            return $request->header('Accept') != 'application/json' ? redirect()->back()->withInput()->withErrors($event->errors()) : response()->json($event->errors());
        }
    }
    
    public function index(Request $request) {
        return $this->resolve_response($request, Event::whereNotIn('status', ['closed','cancelled','complete','paid'])->groupBy('customer_id')->get());
    }
    
    public function byStatus(Request $request) {
        return response()->json(Event::where(['status' => $request->status])->with(['items', 'items.menu_item', 'items.guest', 'items.guest.contact.contact', 'notes'])->get());
    }
    
    public function byCustomer(Request $request) {
        return $this->resolve_response($request, collect(['id' => $request->id, 'events' => Event::where(['customer_id' => $request->id])->with(['items', 'items.menu_item', 'items.guest', 'items.guest.contact.contact', 'notes'])->get()]));
    }
    
    public function create(Request $request) {
        return $this->resolve_response($request, new Event());
    }
    
    public function destroy(Request $request, $id) {
        if (empty($request->delete)) {
            return $this->resolve_response(Event::findOrFail($id)->delete());
        } else {
            $deleted = [];
            foreach ($request->delete as $key => $delete) {
                $deleted[$delete] = Event::findOrFail($delete)->delete();
            }
            return $request->header('Accept') == 'application/json' ? response()->json($deleted) : redirect()->back()->withInput()->withSuccess("Successfully deleted ".count($delete)." events");
        }
    }
    
    public function update(Request $request, $id) {
        $event = Event::findOrFail($id);
        
        if ($event->validate($request->input())) {
            return response()->json($event->update($request->input()));
        } else {
            return response()->json($event->errors());
        }
    }
    
    public function show(Request $request, $id) {
        $event = Event::with(['customer', 'items', 'items.menu_item', 'items.guest', 'items.guest.contact', 'items.guest.contact.contact', 'notes'])->findOrFail($id);
        return $this->resolve_response($request, $event);
    }
    
    public function edit(Request $request, $id) {
        $event = Event::with(['customer', 'items', 'items.menu_item', 'items.guest', 'items.guest.contact.contact', 'notes'])->findOrFail($id);
        return $this->resolve_response($request, $event);
    }
}
