<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Customer\Guest;

class GuestController extends Controller
{
    public function store() {
        $guest = new Guest(Input::all());
        return response()->json($guest->save());
    }
    
    public function index() {
        return response()->json(Guest::all());
    }
    
    public function create() {
        return response()->json(new Guest());
    }
    
    public function destroy($id) {
        return response()->json(Guest::findOrFail($id)->delete());
    }
    
    public function update($id) {
        return response()->json(Guest::findOrFail($id)->update(Input::all()));
    }
    
    public function show($id) {
        return response()->json(Guest::with(['contact', 'dietary_restrictions'])->findOrFail($id));
    }
    
    public function edit($id) {
        return response()->json(Guest::with(['contact', 'dietary_restrictions'])->findOrFail($id));
    }
}
